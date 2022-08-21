<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Mail\MailContact;
use Mail;
class ContactController extends Controller
{
    public function index(){
     
      

        
          
        return view('client/contact');
        
        
    }
    public function sendmail(Request $request){
        //send mail
             if(isset($_GET['submit'])){
            $InputEmail = $_GET['InputEmail'];
            $InputName = $_GET['InputName'];
            $InputSubject = $_GET['InputSubject'];
            $InputMessage = $_GET['InputMessage'];
            $mail_contact = "si.buildy@gmail.com";

            $data = array(  
                            "InputEmail"=>$InputEmail,
                            "InputName"=>$InputName,
                            "InputSubject"=>$InputSubject,
                            "InputMessage"=>$InputMessage,
                        ); 
               Mail::send('emails.email_contact',$data,function($message) use ($InputName,$mail_contact){

                   $message->to($mail_contact)->subject('Thông tin từ khách hàng');//send this mail with subject
                   $message->from($mail_contact,$InputName);
               });
           
           return redirect('')->with('message','');
            }
   }


   public function sub_mail(Request $request)
   {
        //send mail
        

        if(isset($_GET['submit'])){
            $InputEmail = $_GET['email'];
            $mail_contact = "si.buildy@gmail.com";


            $data = array(  
                            "InputEmail"=>$InputEmail,
                           
                        ); 
               Mail::send('emails.Submail',$data,function($message) use ($mail_contact){

                   $message->to($mail_contact)->subject('nội dung khách gửi yêu cầu');//send this mail with subject
                   $message->from($mail_contact);
               });
           
           return redirect('')->with('message','');
            }
   }


           
           

           

}

