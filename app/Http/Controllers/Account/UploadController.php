<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Validator;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Document;
use App\DocKeywords;
use App\Models\Taxonomy;
use Illuminate\Support\Str;
class UploadController extends  Controller{

    public function getUpload() {
        $taxonomy =  Taxonomy::where('parent', '0')->select('id', 'tax_name')->orderby('tax_name','asc')->get();
        $tax_list = $tax_parent = array();
        if ($taxonomy) {
            foreach ($taxonomy as $tax) {
                $tax_list[$tax->id] = $tax->tax_name;
            }
        }
        return view('account.upload-document', compact('tax_list'));
    }

    public function upload_document() {
        unset($_POST['_token']);
        extract($_POST['table']);
        $doc_id = $document['id'];
        $doc_keywords['doc_id'] = $doc_id;
        unset($document['id']);
        Document::where('id', $doc_id)->update($document);
        $doc_keyword = new DocKeywords;
        foreach ($doc_keywords as $key => $value) {
            $doc_keyword->$key = $value;
        }
        $doc_keyword->save();
        return redirect()->back();
    }

    public function postUpload() {
        $taxonomy =  Taxonomy::where('parent', '0')->select('id', 'tax_name')->orderby('tax_name','asc')->get();
        $tax_list = $tax_parent = array();
        if ($taxonomy) {
            foreach ($taxonomy as $tax) {
                $tax_list[$tax->id] = $tax->tax_name;
            }
        }
        return view('account.upload-document', compact('tax_list'));
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
        $destinationPath = 'uploads/documents';
        $extension = Input::file('file')->getClientOriginalExtension();
        $title = pathinfo(Input::file('file')->getClientOriginalName(), PATHINFO_FILENAME);
        if (Document::where('title', $title)->count()) {
            return Response::json('exist', 200);
        }
        $fileName = 'document-'.time(). '.' . $extension;
        $upload_success = Input::file('file')->move($destinationPath, $fileName);

        $document = new Document;
        $document->author = \Auth::check() ? \Auth::user()->id : '';
        $document->title = $title;
        $document->format = $extension;
        $document->link_file = $destinationPath . '/' . $fileName;
        $document->save();
        $document->slug = Str::slug($title.'-'.$document->id);
        $document->save();

        if ($upload_success) {
            return Response::json($document, 200);
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

    function  findTaxByParent () {
        unset($_POST['_token']);
        extract($_POST);
        $taxonomy =  Taxonomy::where('parent', $tax_id)->select('id', 'tax_name')->orderby('tax_name','asc')->get();
        $tax_list = array();
        if ($taxonomy) {
            foreach ($taxonomy as $tax) {
                $tax_list[$tax->id] = $tax->tax_name;
            }
        }
        return json_encode($tax_list);
    }

} 