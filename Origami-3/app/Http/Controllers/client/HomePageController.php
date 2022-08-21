<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApproveMail;
use DB;

class HomePageController extends Controller
{
 
    public function index(){
        $id = false;
      
        
        $data_origami =  DB::table('origami')
        ->select('origami.*', 'category.name AS category_name', 'users.name AS user_name', 'users.avatar AS user_avatar')
        ->join('category', 'category.id', '=', 'origami.category_id')
        ->join('users', 'users.id', '=', 'category.user_id')
        ->whereNull('origami.deleted_at')
        ->get();
        
  
          
        return view('client/Homepage', ['data_origami' => $data_origami ]);
        
        
    }
    public function about()
    {
        return view('client/abount');
    }
}

