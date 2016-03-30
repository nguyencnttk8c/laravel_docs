<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Document;
use Illuminate\Support\Str;
class Upload extends  Controller{

    public function getUpload() {
        return view('account.upload-document');
    }

    public function uploadFiles() {

        $input = Input::all();

//        $rules = array(
//            'file' => 'image|max:3000',
//        );
//
//        $validation = Validator::make($input, $rules);
//
//        if ($validation->fails()) {
//            return Response::make($validation->errors->first(), 400);
//        }
        $destinationPath = 'uploads/documents'; // upload path
        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $title = pathinfo(Input::file('file')->getClientOriginalName(), PATHINFO_FILENAME); // getting file name without extension
        $fileName = 'document-'.time(). '.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
        if (Document::where('title', $title)->count()) {
            return Response::json('exist', 200);
        }
        $document = new Document;
        $document->author = \Auth::check() ? \Auth::user()->id : '';
        $document->title = $title;
        $document->format = $extension;
        $document->link_file = $destinationPath . '/' . $fileName;
        $document->save();
        $document->slug = Str::slug($title.'-'.$document->id);
        $document->save();

        if ($upload_success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }

    public function deleteFiles() {
        unset($_POST['_token']);
        extract($_POST);
        $title = pathinfo($file, PATHINFO_FILENAME);
        $format = pathinfo($file, PATHINFO_EXTENSION);
        if (Document::where('title', $title)->where('format', $format)->count()) {
            $file = Document::where('title', $title)->where('format', $format)->first();
            \File::delete($file->link_file);
            $file->delete();
        }
        return 1;
    }

} 