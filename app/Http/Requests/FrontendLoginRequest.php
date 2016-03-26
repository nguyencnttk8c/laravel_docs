<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FrontendLoginRequest extends Request
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
            'useremail'   => 'required|email',
            'password'    => 'required'
        ];
    }

    public function messages() {
        return [
            'useremail.required'  => 'Vui lòng nhập email',
            'useremail.email'     => 'Vui lòng nhập email theo dạng abc@xyz.com',
            'password.required'   => 'Vui lòng nhập password',
        ];
    }
}
