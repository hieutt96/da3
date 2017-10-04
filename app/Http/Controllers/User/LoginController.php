<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth ;

use App\Http\Request\LoginRequest;

/**
* 
*/
class LoginController extends Controller
{
	
	
	public function getLogin(){
		return view('user.login');
	}

	public function postLogin(LoginRequest $request){
		$user = [
			'email' => $request->email,
			'password' => $request->password,
			'status' => 1,
		];
		if(Auth::attempt($user)){
			return redirect('/');
		}
		return redirect('dang-nhap')->with('invalid','Sai thong tin dang nhap');
	}
	public function logout(){
		Auth::logout();
		return redirect()->route('dang-nhap');
	}
}