<?php

namespace App\Http\Controllers\admin\origami;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\origami\CreateRequest;
use App\Http\Requests\admin\origami\UpdateRequest;
use DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class OrigamiController extends Controller
{   
    public function index(){
        return view('admin.module.origami.index');
    }

    public function create(){
        return view('admin.module.origami.create');
    }

    public function store(CreateRequest $request){
        $data = $request->except('_token', 'intro_image');
        $data['created_at'] = new DateTime();
        $data['updated_at'] = new DateTime();
        $data['slug'] = str_replace(' ', '-', $data['name']);

        $imageName = time().'.'.$request->intro_image->extension(); 
        $data['intro_image'] = $imageName;
        $request->intro_image->move(public_path('images'), $imageName);

        DB::table('origami')->insert($data);

        return redirect()->route('admin.origami.index')->with('success', 'A New Origami Has Been Successfully Created!');
    }

    public function edit($id){
        $editData = DB::table('origami')->where('id', $id)->first();
    
        return view('admin.module.origami.edit', ['id' => $id, 'oldData' => $editData]);
    }

    public function update(UpdateRequest $request, $id){
        $data = $request->except('_token', 'intro_image');
        $data['updated_at'] = new DateTime();

        if(!empty($request->intro_image)){
            $validated = $request->validate([
                'intro_image' => ['required', 'mimes:jpeg,jpg,png', 'max:2048'],
            ]);
            
            $oldImage = DB::table('origami')->where('id', $id)->first();

            if(file_exists('images/'.$oldImage->intro_image)){
                unlink('images/'.$oldImage->intro_image);
            }

            $imageName = time().'.'.$request->intro_image->extension(); 
            $data['intro_image'] = $imageName;
            $request->intro_image->move(public_path('images'), $imageName);
        }

        DB::table('origami')->where('id', $id)->update($data);

        return redirect()->route('admin.origami.index')->with('edited', 'An Origami Has Been Successfully Edited!');
        
    }

    public function destroy($id){
        $oldImage = DB::table('origami')->where('id', $id)->first();

        if(file_exists('images/'.$oldImage->intro_image)){
            unlink('images/'.$oldImage->intro_image);
        }

        $data['deleted_at'] = new DateTime();
        DB::table('origami')->where('id', $id)->update($data);
        DB::table('image')->where('origami_id', $id)->update($data);
        DB::table('feedback')->where('origami_id', $id)->update($data);

        return redirect()->route('admin.origami.index')->with('deleted', 'An Origami Has Been Successfully Deleted Along With The Feedback!'); 
    }

    public function editSelected($length, $array){
        return view('admin.module.origami.editSelect', ['length' => $length, 'array' => $array]);
    }

    public function updateSelected(Request $request, $length, $array){
        $ids = unserialize($length.'{'.$array.'}');
        $data['category_id'] = $request->category_id;
        DB::table('origami')->whereIn('id', $ids)->update($data);
        return redirect()->route('admin.origami.index')->with('success', 'Categories Have Been Updated!'); 
    }
}
