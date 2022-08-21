<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class category_page extends Controller
{
    public function index($slug){
        $id = false;
        $data_catelory = DB::table('category')
        ->select('category.*', 'users.name AS user_name', 'users.id AS user_id')
        ->join('users', 'users.id', '=', 'category.user_id')
        ->whereNull('category.deleted_at')
        ->when($id, function($query, $id){
            return $query->where('users.id', $id);
        })
        ->get();


        $data= DB::table('category')
        ->join('origami','origami.category_id','=','category.id')
        ->select('origami.*','category.name as cate_name')
        ->where('category.slug',$slug)->paginate(4);
        $popular_orgiami = DB::table('origami')->inRandomOrder()->take(3)->get();
        $title = DB::table('category')->where('slug',$slug)->first();
        $category=DB::table('category')->get();
     
       
       return view('client.category',['data'=>$data,'category'=>$category,'title'=>$title,'popular'=>$popular_orgiami, 'data_catelory'=>$data_catelory]);
    }
}
