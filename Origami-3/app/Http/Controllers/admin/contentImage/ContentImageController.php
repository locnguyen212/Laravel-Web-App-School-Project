<?php

namespace App\Http\Controllers\admin\contentImage;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\contentImage\CreateRequest;
use Illuminate\Http\Request;
use DB;
use DateTime;

use function PHPUnit\Framework\isEmpty;

class ContentImageController extends Controller
{   
    public function origami(){
        $id = false;
        if(auth()->user()->level != 1){
            $id = auth()->user()->id;
        }
        $data = DB::table('origami')
                    ->select('origami.*', 'category.user_id AS user_id')
                    ->join('category', 'category.id', '=', 'origami.category_id')
                    ->when($id, function($query, $id){
                        return $query->where('category.user_id', $id);
                    })
                    ->whereNull('origami.deleted_at')
                    ->get();

        return $data;
    }

    public function index(){
        $id = false;
        if(auth()->user()->level != 1){
            $id = auth()->user()->id;
        }

        $data = DB::table('image')
                    ->select('image.*', 'origami.name AS origami_name', 'origami.id AS origami_id')
                    ->join('origami', 'origami.id', '=', 'image.origami_id')
                    ->join('category', 'category.id', '=', 'origami.category_id')
                    ->when($id, function($query, $id){
                        return $query->where('category.user_id', $id);
                    })
                    ->whereNull('image.deleted_at')
                    ->get();

        return view('admin.module.image.index', ['data' => $data]);
    }

    public function create(){
        $origami = $this->origami();
        return view('admin.module.image.create', ['origami' => $origami]);
    }

    public function store(CreateRequest $request){
        $data = array();

        foreach($request->image as $key => $file)
            {   
                $name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path('images'), $name);
                $data[$key]['image'] = $name;
                $data[$key]['origami_id'] = $request->origami_id;
                $data[$key]['created_at'] = new \Datetime();
                $data[$key]['updated_at'] = new \Datetime();   
            }

        DB::table('image')->insert($data);

        return redirect()->route('admin.image.index')->with('success', 'A New Image Has Been Successfully Created!');
    }

    public function edit($id){
        $editData = DB::table('image')->where('id', $id)->first();
        $origami = $this->origami();
        return view('admin.module.image.edit',
        [
        'id' => $id,
        'data' => $editData,
        'origami' => $origami
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->except('_token', 'image');
        $data['updated_at'] = new DateTime();

        if(!empty($request->image)){
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg','max:2048']
            ]);

            $oldImage = DB::table('image')->where('id', $id)->first(); 
            if(file_exists('Images/'.$oldImage->image)){
                unlink('Images/'. $oldImage->image);
            }

            $imageName = time().'.'.$request->image->extension();  
            $data['image'] = $imageName;

            $request->image->move(public_path('images'), $imageName);     
        }

        DB::table('image')->where('id', $id)->update($data);

        return redirect()->route('admin.image.index')->with('edited', 'An Image Has Been Successfully Edited!');
    }

    public function destroy($id){
        $oldImage = DB::table('image')->where('id', $id)->first();

        if(file_exists('images/'.$oldImage->image)){
            unlink('images/'.$oldImage->image);
        }

        $data['deleted_at'] = new DateTime();
        DB::table('image')->where('id', $id)->update($data);

        return redirect()->route('admin.image.index')->with('deleted', 'An Image Has Been Successfully Deleted!'); 
    }
}
