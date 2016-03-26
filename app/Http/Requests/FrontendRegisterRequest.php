<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FrontendRegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'   => 'required|between:6,20',
            'useremail'  => 'required|email|unique:customers,email',
            'password'   => 'required|between:6,20',
            'repassword' => 'required|between:6,20|same:password',
        ];
    }

    public function messages() {
        return [
            'username.required'   => 'Vui lòng nhập họ tên!',
            'username.between'    => 'Vui lòng nhập tên từ 6 - 20 ký tự',
            'useremail.required'  => 'Vui lòng nhập Email!',
            'useremail.unique'    => 'Email đã tồn tại!',
            'useremail.email'     => 'Vui lòng nhập Email theo dạng abc@xyz.com',
            'password.required'   => 'Vui lòng nhập mật khẩu!',
            'password.between'    => 'Vui lòng nhập mật khẩu từ 6 - 20 ký tự',
            'repassword.between'  => 'Vui lòng nhập mật khẩu từ 6 - 20 ký tự',
            'repassword.required' => 'Vui lòng nhập xác nhận mật khẩu!',
            'repassword.same'     => 'Vui lòng nhập đúng mật khẩu xác nhận',
        ];
    }
}
