<?php

namespace App\Http\Controllers\admin\feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\feedback\UpdateRequest;
use App\Mail\ApproveMail;
use Illuminate\Http\Request;
use DB;
use DateTime;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\admin\feedback\StroreFeedbackRequest;

class FeedbackController extends Controller
{      
    public function index(){
        $id = false;
        if(auth()->user()->level != 1){
            $id = auth()->user()->id;
        }
        $data = DB::table('feedback')
                    ->select('feedback.*', 'origami.name AS origami_name', 'users.name AS user_name')
                    ->join('origami', 'origami.id', '=', 'feedback.origami_id')
                    ->join('category', 'category.id', '=', 'origami.category_id')
                    ->join('users', 'users.id', '=', 'category.user_id')
                    ->when($id, function($query, $id){
                        return $query->where('users.id', $id);
                    })
                    ->whereNull('feedback.deleted_at')
                    ->get();
        return view('admin.module.feedback.index', ['data' => $data]);
    }

    public function destroy($id){
        $data['deleted_at'] = new DateTime();

        DB::table('feedback')->where('id', $id)->update($data);
        $isExist = DB::table('feedback')->where('parent_id', $id)->first();
        if($isExist){
            DB::table('feedback')->where('parent_id', $id)->update($data);
        }
        return redirect()->route('admin.feedback.index')->with('deleted', 'A Feedback Has Been Successfully Deleted!');
    }
    public function replay($id){
        $data = DB::table('feedback')->where([['id',$id],['deleted_at',Null]])->first();

        return view('admin.module.feedback.replay',['data'=>$data]);
    }
    public function storereplay(StroreFeedbackRequest $request){
        $data = DB::table('feedback')->where([['id',$request->id],['deleted_at',Null]])->first();
        $data_feedback = [
            'origami_id' => $data->origami_id,
            'parent_id' => $request->id,
            'content' => $request->content,
            'status' => 2,
            'name' => auth()->user()->name,
            'email' =>  auth()->user()->email,
            'created_at' => new \Datetime(),
            'updated_at' => new \Datetime(),
        ];
        DB::table('feedback')->insert($data_feedback);
        return redirect()->route('admin.feedback.index');
    }
}



