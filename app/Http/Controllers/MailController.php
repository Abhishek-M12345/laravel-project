<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // basic email

    public function send_basic_email(){
        $data= array('name' => 'Abhishek Mondal');

        Mail::send(['text' => 'mail'], $data, function($message){
            $message->to('mondalabhishek50@gmail.com', 'Abhishek Mondal')->subject('Laravel Test Mail');
            $message->form('abhishekm.timd@gmail.com', 'Abhi');
        });

        echo "Email Is sent!";
    }

     // for attachment

     public function send_attach_email(){
        $data= array('name' => 'Abhishek Mondal');

        Mail::send('mail', $data, function($message){
            $message->to('mondalabhishek50@gmail.com', 'Abhishek Mondal')->subject('Laravel Test Mail attacment');
            //$message->attach(any image or pdf r any file link to attach with mail);
            $message->form('abhishekm.timd@gmail.com', 'Abhi');
        });

        echo "Email Is sent!";
    }


     // basic HTML email

     public function send_html_email(){
        $data= array('name' => 'Abhishek Mondal');

        Mail::send('mail', $data, function($message){
            $message->to('mondalabhishek50@gmail.com', 'Abhishek Mondal')->subject('Laravel Test Mail');
            $message->form('abhishekm.timd@gmail.com', 'Abhi');
        });

        echo "Email Is sent!";
    }
}
