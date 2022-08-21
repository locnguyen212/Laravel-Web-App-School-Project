<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Mail\ApproveMail;
use Illuminate\Support\Facades\Mail;
use DateTime;

class Approve extends Component
{   
    public $status;
    public $feedback_id;

    public function confirm(){
        $data['status'] = $this->status;
        $data['updated_at'] = new DateTime();
        $updated = DB::table('feedback')->where('id', $this->feedback_id)->first();
        
        //Gửi email

        if($updated->updated_at == NULL){
            $email = DB::table('feedback')->where('id', $this->feedback_id)->first()->email;

            $Mail = [
                'title' => 'Origami Comment Approve Notification',
                'body' => 'Your comment has been approve!!'
            ];

            Mail::to($email)->send(new ApproveMail($Mail));
        }

        //Gửi email

        DB::table('feedback')->where('id', $this->feedback_id)->update($data);
        
        return redirect()->route('admin.feedback.index');
    }
}
