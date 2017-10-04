<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller; 

use Illuminate\Support\Facades\Mail;
 /**
 * 
 */
 class MailController extends Controller
 {
 	
 	public static function mailRegister($user ,$token){
 		Mail::send('user.mailregister',['user'=>$user,'token'=>$token],function($message) use ($user){
 			$message->from('support@trungbay.com','Kich Hoa Tai Khoan');
 			$message->subject('Kich Hoat Tai Khoan')->to($user->email,$user->name);
 		});
 	}
 }