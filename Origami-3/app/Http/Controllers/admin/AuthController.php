<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AuthRequest;
use Illuminate\Http\Request;
use DB;
use Auth;

class AuthController extends Controller
{
    public function loginPage(){
        if(Auth::check()){
            return redirect()->route('admin.origami.index');
        }
        return view('admin.login');
    }

    public function login(AuthRequest $request){
        $data = $request->except('_token');

        if (Auth::attempt($data)) {
                $request->session()->regenerate();

                if(auth()->user()->level == 1){
                    return redirect()->route('admin.index')->with('loginSuccess', 'Login Successfully! Welcome!');
                }else{
                    return redirect()->route('admin.category.index')->with('loginSuccess', 'Login Successfully! Welcome!');
                }
                           
        }else {
            return redirect()->route('login_page')->with('loginError', 'Incorrect Email Or Password!');
        }

    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login_page');
    }
}
