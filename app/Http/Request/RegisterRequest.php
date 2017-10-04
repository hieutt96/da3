<?php
 namespace App\Http\Request;

 use Illuminate\Foundation\Http\FormRequest;
  /**
  * 
  */
  class RegisterRequest extends FormRequest
  {
  	public function rules(){
  		return [
			'name' => 'required|min:2|max:30',
			'email'=>'required|email|max:50|unique:users',
			'password'=>'min:6|same:password_confirmation',
			'password_confirmation'=>'required'
  		];
  	}
  	public function messages(){
  		return [
  			'name.required'=>'Bạn chưa điền họ tên',
  			'name.min'=>'Có vẻ như tên bạn chưa đúng',
  			'name.max'=>'Họ và tên đêm quá dài',
  			'email.required'=>'Bạn chưa nhập email',
  			'email.max'=>'Email quá dài',
  			'email.email'=>'Email không hợp lệ',
  			'email.unique'=>'Email này đã được sử dụng',
  			'password.min'=>'Password qua ngan',
  			'password.same'=>' Mat khau khong trung voi mat khau chinh',
  			'retype.required'=>'Vui long nhap lai mat khau'
  		];
  	}
    public function authorize() {
      return true;
    }
  }