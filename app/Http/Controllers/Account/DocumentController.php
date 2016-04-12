<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\User;
use App\Document;
use App\DocMeta;

class DocumentController extends Controller{
    public function getIndex() {
        $user_id = \Auth::user()->id;
        $documents = Document::where('author', $user_id)->get();
        return view('account.document-management', ['data'=>$documents]);
    }
} 