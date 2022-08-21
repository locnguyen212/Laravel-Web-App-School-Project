<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $category = DB::table('category')->whereNull('deleted_at')->count();
        $feedback = DB::table('feedback')->where('status', 2)->whereNull('deleted_at')->count();
        $origami = DB::table('origami')->whereNull('deleted_at')->count();
        $image = DB::table('image')->whereNull('deleted_at')->count();
        $user = DB::table('users')->whereNull('deleted_at')->count();

        return view('admin.module.index.index',
        [
            'category' =>  $category,
            'feedback' =>  $feedback,
            'origami' =>  $origami,
            'image' =>  $image,
            'user' =>  $user,
        ]);
    }
}
