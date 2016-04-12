<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\User;
class PersonalInformation extends Controller{

    public function  getIndex () {
        $user = \Auth::user();
        return view('account.personal-info', ['user'=>$user]);
    }

    public function postIndex() {
        $data = \Request::Input();
        foreach ($data as $key=>$value) {
            if ($value == '' || $key == '_token') {
                unset($data[$key]);
            }
        }
        if (isset($data['gender'])) {
            if ($data['gender'] == 'Nam') {
                $data['gender'] = 'nam';
            } else if ($data['gender'] == 'Nữ') {
                $data['gender'] = 'nu';
            }
        }
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $id = \Auth::id();
        $result = User::where('id', $id)->update($data);
        return redirect()->back();
    }
}