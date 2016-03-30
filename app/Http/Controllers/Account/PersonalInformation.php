<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\User;
class PersonalInformation extends Controller{

    public function  getIndex () {
        $user = User::find(1);
        //dd($user);
        \Auth::login($user, true);
        $user = '';
        if (!\Auth::check()) {
            return redirect('login');
        } else {
            $user = \Auth::user();
        }
        return view('account.personal-info', ['user'=>$user]);
    }

    public function postIndex() {
        $data = \Request::Input();
        unset($data['_token']);
        $id = \Auth::id();
        $data['birth_day'] = \Carbon\Carbon::createFromFormat('d-m-Y', $data['birth_day']);
        $result = User::where('id', $id)->update($data);
    }
} 