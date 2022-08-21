<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\category\CreateRequest;
use App\Http\Requests\admin\category\UpdateRequest;
use DateTime;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{   
    public function index(){
        $id = false;
        if(auth()->user()->level != 1){
            $id = auth()->user()->id;
        }

        $data = DB::table('category')
                    ->select('category.*', 'users.name AS user_name', 'users.id AS user_id')
                    ->join('users', 'users.id', '=', 'category.user_id')
                    ->whereNull('category.deleted_at')
                    ->when($id, function($query, $id){
                        return $query->where('users.id', $id);
                    })
                    ->get();

        return view('admin.module.category.index', ['data' => $data]);
    }

    public function create(){
        $user = DB::table('users')->whereNull('deleted_at')->get();
        return view('admin.module.category.create',['user' => $user]);
    }

    public function store(CreateRequest $request){
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        $data['slug'] = str_replace(' ', '-', $data['name']);

        DB::table('category')->insert($data);

        return redirect()->route('admin.category.index')->with('success', 'A New Category Has Been Successfully Created!');
    }

    public function edit($id){
        $editData = DB::table('category')->where('id', $id)->first();
        $user = DB::table('users')->whereNull('deleted_at')->get();

        if($editData->user_id == auth()->user()->id || auth()->user()->level == 1){
            return view('admin.module.category.edit',
            [
                'id' => $id, 
                'oldData' => $editData,
                'user' => $user,
            ]);
        }else{
            return redirect()->route('admin.category.index')->with('alert', 'You Cannot Edit This Category!');
        }
        
    }

    public function update(UpdateRequest $request, $id){
       

        $data = $request->except('_token');
       
        $data['updated_at'] = new DateTime();
        if($request->id == $request->parent_id){
            
            $parent_id = DB::table('category')->where('id', $id)->first()->parent_id; 
            $data['parent_id'] = $parent_id;
        }

        DB::table('category')->where('id', $id)->update($data);

        return redirect()->route('admin.category.index')->with('edited', 'A Category Has Been Successfully Edited!');
    }

    public function destroy($id){
        $isExist = DB::table('category')->where('parent_id', $id)->first();
        $isOrigamiExist = DB::table('origami')->where('category_id', $id)->first();

        if($id != 1){
            if($isExist){
                $data['parent_id'] = 0;
                DB::table('category')->where('parent_id', $id)->update($data);

                $deleteData['deleted_at'] = new \DateTime();
                DB::table('category')->where('id', $id)->update($deleteData);

                return redirect()->route('admin.category.index')->with('success', 'A Parent Category Has Been Successfully Deleted, Child Category(ies) Has/Have Now Become Parent Category(ies)');
    
            }elseif(!$isExist && $isOrigamiExist){
                $origami['updated_at'] = new \DateTime();
                $origami['category_id'] = 1;
    
                DB::table('origami')->where('category_id', $id)->update($origami);
    
                $data['deleted_at'] = new \DateTime();
                DB::table('category')->where('id', $id)->update($data);
    
                return redirect()->route('admin.category.index')->with('success', 'A Category Has Been Successfully Deleted And The Origami(s) Had Been Move To Uncategorize!');
    
            }else{
                $data['deleted_at'] = new \DateTime();
                DB::table('category')->where('id', $id)->update($data);
                return redirect()->route('admin.category.index')->with('deleted', 'A Category Has Been Successfully Deleted!');
            }    
        }else{
            return redirect()->route('admin.category.index')->with('alert', 'You Cannot Delete This Category');
        }
        


        
    }
}
