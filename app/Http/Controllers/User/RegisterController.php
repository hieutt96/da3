<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Request\RegisterRequest;
use App\Http\Controllers\User\MailController;    

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function getRegister () {
        return view('user.register');
    }
    public function postRegister(RegisterRequest $request) {
        $user =new User;
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // tạo ra 1 token để xác nhận tài khoản
        $user['token']=str_random(64);
        $findUser = User::find($user['id']);
        $findUser->remember_token = $user['token'];
        $findUser -> save();
        // dd($user);

        if($user) {
            MailController::mailRegister($user,$user['token']);
            return redirect('dang-ky')->with('status','Ban da dang ky thanh cong vui long truy cap email de kich hoat tai khoan');
        }
        return redirect()->back()->withInput();
    }
    public function confirmRegister($token){
        $userRegister = User::where('remember_token',$token)->first();
        if($userRegister){
            $userRegister->status=1;
            $userRegister->remember_token='';
            $userRegister->save();
            return redirect('dang-nhap')->with('status','Tai khoan da duoc kich hoat ,hay dang nhap');
        }
    }
}
