<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    
    function search(Request $request){
        if(isset($_GET['query'])){
            $query = $_GET['query'];
          
                 
            $id = false;
            $data_origami =  DB::table('origami')
            ->select('origami.*', 'category.name AS category_name', 'users.name AS user_name', 'users.avatar AS user_avatar')
            ->join('category', 'category.id', '=', 'origami.category_id')
            ->join('users', 'users.id', '=', 'category.user_id')

            ->where('origami.name', 'LIKE', '%' . $query . '%')->paginate(10);
           
            $count = $data_origami->count();
           

            return view('client/search', ['data_origami' => $data_origami  , 'count'=>$count]);

           
        }
        
       
  

}
}
