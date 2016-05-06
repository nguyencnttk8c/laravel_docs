<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\User;
use App\DocBank;
class PersonalInformation extends Controller{

    public function  getIndex () {
        $user = \Auth::user();
        $user->bank_info = json_decode($user->bank_info);
        $data = array();
        $data['title'] = 'Cập nhật thông tin cá nhân';
        $user_bank =  $user->Bank;
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
            DocBank::insert($new_bank_data);
        }
        return redirect()->back();
    }
}