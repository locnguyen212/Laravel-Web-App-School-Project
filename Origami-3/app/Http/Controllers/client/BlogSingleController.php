<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\client\feedback\StoreRequest;

class BlogSingleController extends Controller
{
    public function index($slug){
        /** Select bai viet,user, */
        $data = DB::table('origami')
        ->join('category','origami.category_id','=','category.id')
        ->join('users', 'users.id', '=', 'category.user_id')
        ->select('origami.*','category.name AS cate_name','users.name AS user_name','users.avatar AS user_avatar')
        ->where('origami.slug',$slug)
        ->first();
        /**select origami */
        $popular_orgiami = DB::table('origami')->inRandomOrder()->take(3)->get();
        /**select feedback */
        
       return view('client.blogsingle',['data'=>$data,'popular'=>$popular_orgiami]);
    }
    public function FeedbackBlogSingle(StoreRequest $request,$slug){
        $origami_id = DB::table('origami')->where('slug',$slug)->first();
        $data = $request->except('_token');
        $data['origami_id'] = $origami_id->id;
        $data['created_at'] = new \Datetime();
        $data['status'] = 1;
        DB::table('feedback')->insert($data);
        return redirect()->back();
        
    }
    function url(){
        if(isset($_SERVER['SERVER_NAME'])){
            $protocol = ($_SERVER['SERVER_NAME'] && $_SERVER['SERVER_NAME'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['SERVER_NAME'];
    }
}
