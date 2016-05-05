<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\User;
class PersonalInformation extends Controller{

    public function  getIndex () {
        $user = \Auth::user();
        $user->bank_info = json_decode($user->bank_info);
        $data = array();
        $data['title'] = 'Cập nhật thông tin cá nhân';
        return view('account.personal-info', compact('data', 'user'));
    }

    public function postIndex() {
        extract($_POST);
        if (isset($user['password']) && $user['password'] != '') {
            $user['password'] = bcrypt($user['password']);
        } else {
            unset( $user['password']);
        }
        $user['bank_info'] = json_encode($user['bank_info']);
        $id = \Auth::id();
        $result = User::where('id', $id)->update($user);
        return redirect()->back();
    }
}