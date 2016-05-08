<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\User;
use App\DocBank;
use Validator;
use Illuminate\Http\Request;
class PersonalInformation extends Controller{

    public function  getIndex () {
        $user = \Auth::user();
        $user->bank_info = json_decode($user->bank_info);
        $data = array();
        $data['title'] = 'Cập nhật thông tin cá nhân';
        $user_bank =  $user->Bank;
        if (\Session::has('msg')) {
            $data['msg'] = \Session::get('msg');
            //dd( $data['msg']);
            \Session::put('msg', '');
            \Session::forget('msg');
        }

        return view('account.personal-info', compact('data', 'user', 'user_bank'));
    }

    public function postIndex() {
        extract($_POST);
        if (isset($user['password']) && $user['password'] != '') {
            $user['password'] = bcrypt($user['password']);
        } else {
            unset( $user['password']);
        }
        $id = \Auth::id();
        $result = User::where('id', $id)->update($user);
        $new_bank_data = $bank['new'];
        unset($bank['new']);
        foreach ($bank as $key=>$b) {
            if (DocBank::find($key)) {
                DocBank::where('id', $key)->update($b);
            } else {
                DocBank::insert($b);
            }
        }
        foreach ($new_bank_data as $col=>$da) {
            if ($da == '') {
                unset($new_bank_data[$col]);
            }
        }
        if (!empty($new_bank_data)) {
            $new_bank_data['user_id'] = $id;
            $rules = [
                'bank_id' => 'required|unique:bank',
                'acc_name' => 'required',
                'bank_name' => 'required',
                'bank_brand' => 'required'
            ];
            $messages = [
                'bank_id.unique' => 'Số khoản đã tồn tại, chọn tài khoản khác!',
                'required' => 'Trường không được để trống!',
            ];
            $validator = Validator::make($new_bank_data, $rules,$messages);
            if (!$validator->fails()) {
                DocBank::insert($new_bank_data);
            } else {
                $msg = $validator->errors();
                return \Redirect::back()->with('msg',$msg);
            }

        }
        return redirect()->back();
    }
}