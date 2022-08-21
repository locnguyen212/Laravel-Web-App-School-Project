<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\user\CreateRequest;
use App\Http\Requests\admin\user\UpdateRequest;
use DateTime;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
        $data = DB::table('users')->whereNull('deleted_at')->get();
        return view('admin.module.user.index',['data'=>$data]);
    }

    public function create(){
        if(auth()->user()->level != 1){
            return redirect()->route('admin.user.index')->with('alert', 'You Cannot Access This Function!');
        }else{
            return view('admin.module.user.create');
        }
    }

    public function store(CreateRequest $request){
        $data = request()->except('_token','password','password_confirmation');
        $data['password'] = bcrypt($request->password);
        $data['updated_at'] = new \Datetime();
        $data['created_at'] = new \Datetime();
        $data['level'] = 2;

        $imageName = time().'.'.$request->avatar->extension(); 
        $data['avatar'] = $imageName;
        $request->avatar->move(public_path('images'), $imageName);

        DB::table('users')->insert($data);

        return redirect()->route('admin.user.index')->with('success', 'A New User Has Been Successfully Created!');
    }

    public function edit($id){
        $data = DB::table('users')->where('id',$id)->first(); 

        $edit_myself = NULL;
        if (auth()->user()->id == $id) {
            $edit_myself = true;
        } else {
            $edit_myself = false;
        }

        if(auth()->user()->level == 2 && $edit_myself == false){
            return redirect()->route('admin.user.index')->with('editError', 'You Can Not Edit This Admin');
        }else{
            return view('admin.module.user.edit', ['id' => $id, 'oldData' => $data]);
        }
    }

    public function update(UpdateRequest $request, $id){
        $user = $request->except('_token', 'password_confirmation', 'password', 'avatar');
        $user['updated_at'] = new DateTime();

        if(auth()->user()->level == 1){
            $validated = $request->validate([
                'email' => ['required', 'email', 'unique:users,email,'.$id, 'max:30'],
            ]);
        }

        if(!empty($request->password)){
            $validated = $request->validate([
                'password' => ['confirmed', 'min:6'],
            ]);

            $user['password'] = bcrypt($request->password);
        }

        if(!empty($request->avatar)){
            $validated = $request->validate([
                'avatar' => ['required', 'mimes:jpeg,jpg,png', 'max:2048'],
            ]);
            
            $oldImage = DB::table('users')->where('id', $id)->first();

            if(file_exists('images/'.$oldImage->avatar)){
                unlink('images/'.$oldImage->avatar);
            }

            $imageName = time().'.'.$request->avatar->extension(); 
            $user['avatar'] = $imageName;
            $request->avatar->move(public_path('images'), $imageName);
        }

        DB::table('users')->where('id', $id)->update($user);

        return redirect()->route('admin.user.index')->with('edited', 'A User Has Been Successfully Edited!');
  
    }

    public function destroy($id){
        if(auth()->user()->level == 2){
            return redirect()->route('admin.user.index')->with('deletedError', 'You Can Not Use This Function!');
        }elseif(auth()->user()->id == $id){
            return redirect()->route('admin.user.index')->with('deletedError', 'You Can Not Delete Yourself!');
        }else{
            $data['deleted_at'] = new DateTime();
            $superAdmin['user_id'] = 1;

            DB::table('category')->where('user_id', $id)->update($superAdmin);
            DB::table('users')->where('id', $id)->update($data);
            
            return redirect()->route('admin.user.index')->with('deleted', 'A User Has Been Successfully Deleted!'); 
        }
    }
}
