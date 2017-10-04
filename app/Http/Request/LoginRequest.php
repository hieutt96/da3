<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

 /**
 * 
 */
 class LoginRequest extends FormRequest
 {
 	
 	public function rules(){
 		return [
			'email' => 'required|email',
			'password' => 'required|min:6'
 		];
 	}

 	public function messages(){
 		return [
 			'email.required' => 'Ban chua dien email',
 			'email.email' => 'Email khong hop le',
 			'password.required' => 'Ban chua dien password',
 			'password.min' => "Mat khau qua ngan"
 		];
 	}

 	public function authorize() {
 		return true;
 	}
 }