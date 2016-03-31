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
            'ctrlhotentxt'   => 'required|between:6,20',
            'ctrlphonetxt'   => 'required|numeric|digits_between:10,12',
            'ctrlemailtxt'   => 'required|email|unique:customers,email',
            'ctrlpasstxt'    => 'required|between:6,20',
            'ctrlrepasstxt'  => 'required|between:6,20|same:ctrlpasstxt',
            // 'captcha'        => 'required|captcha'
        ];
    }

    public function messages() {
        return [
            'ctrlhotentxt.required'   => 'Vui lòng nhập họ tên!',
            'ctrlhotentxt.between'    => 'Vui lòng nhập tên từ 6 - 20 ký tự',

            'ctrlphonetxt.required'   => 'Vui lòng nhập số điện thoại',
            'ctrlphonetxt.numeric'    => 'Vui lòng nhập theo dạng 09xx xxx xxx hoặc 01xxx xxx xxx',
            'ctrlphonetxt.between'    => 'Vui lòng nhập theo dạng 09xx xxx xxx hoặc 01xxx xxx xxx',

            'ctrlemailtxt.required'   => 'Vui lòng nhập Email!',
            'ctrlemailtxt.unique'     => 'Email đã tồn tại!',
            'ctrlemailtxt.email'      => 'Vui lòng nhập Email theo dạng abc@xyz.com',

            'ctrlpasstxt.required'    => 'Vui lòng nhập mật khẩu!',
            'ctrlpasstxt.between'     => 'Vui lòng nhập mật khẩu từ 6 - 20 ký tự',
            
            'ctrlrepasstxt.between'   => 'Vui lòng nhập mật khẩu từ 6 - 20 ký tự',
            'ctrlrepasstxt.required'  => 'Vui lòng nhập xác nhận mật khẩu!',
            'ctrlrepasstxt.same'      => 'Vui lòng nhập đúng mật khẩu xác nhận',
            // 'captcha.required'        => 'Vui lòng nhập mã Captcha',
            // 'captcha.captcha'         => 'Mã Captcha không chính xác'
        ];
    }
}
