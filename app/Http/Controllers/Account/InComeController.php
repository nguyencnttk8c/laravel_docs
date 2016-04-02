<?php
namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\User;
use App\Document;
use App\DocMeta;

class InComeController extends Controller {
    public function getIndex() {
        return view('account.income');
    }
} 