<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Helpes\Backend\Functions;
use App\Helpes\Backend\MessageElements as MessageElements;
use App\DocKeywords;
use Illuminate\Support\Facades\Input;

class DocumentController extends ResoureController
{
	protected $_titleIndex = 'Quản lý tài liệu';
	protected $_urlAndFormView = 'document';
	protected $_routeEdit = 'Backend::ducumentEdit';
	protected $_titleEdit = 'Cập nhật tài liệu ID = ';
	protected $_titleNew = 'Thêm mới tài liệu';

	public function __construct(\App\Document $model){
		 $this->_model = $model;

	}
	
	
	public function dataProvider($id){
		$keywords = '';
		if($id){
			$keywords = $this->_model->find($id)->DocKeywords->lists('key_word');
			if($keywords){
				$keywords = implode(',',$keywords->toArray());
			}
		}
		return [
			"authors" => \App\Models\Customer::where('status',1)->where('role','!=','admin')->lists('name','id'),
			"terms" => \App\Models\Taxonomy::lists('tax_name','id'),
			"keywords" => $keywords,
			"edit" => $id ? true : false,
		];
	}

	public function thisKeywords($id){
		if($id){
			$document = $this->_model->find($id);
			$keywords = $document->DocKeywords()->lists('key_word');
			if($keywords){
				return  $keywords->toArray();
			}else{
				return [];
			}
		}else{
			return [];
		}
	}

	public function uploadDoc($file){
       // SET UPLOAD PATH
        $destinationPath = 'uploads/documents';
        // GET THE FILE EXTENSION
        $extension = $file->getClientOriginalExtension();
        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName =  md5(md5($file->getClientOriginalName())) . '.' . $extension;
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $file->move($destinationPath, $fileName);
        return [
        	'filename'=>$fileName,
        	'extension'=>$extension,
        ];
	}

	public function postEdit(\Request $request = null, $id = null){
		
		if(isset(\Request::input()['data'])){
			$input = Input::all();
			$file = array_get($input,'file');
			$postForm = \Request::input()['data'];
			if($file){
				$fileInfo = $this->uploadDoc($file);
				$postForm['link_file'] = $fileInfo['filename'];
				$postForm['format'] = $fileInfo['extension'];
			}
			
			$params = [
				'status'=>($id)?'update':'insert',
				'datas'=>$postForm,
				'table'=> $this->_model
			];
			if($id){
				$params['id'] = $id;
			}
			$id = Functions::IUD($params);
			$document = $this->_model->find($id);
			if(isset(\Request::input()['keywords']) && \Request::input()['keywords']){
				$thisKeywords = $this->thisKeywords($id);
				$keywords = explode(',',\Request::input()['keywords']);
				if($keywords){
					foreach($keywords as $key){
						$key = trim($key);
						if(!in_array($key,$thisKeywords)){
							$documentKeyword = $document->Document ?: new \App\DocKeywords;

							$documentKeyword->key_word = $key;
							$document->DocKeywords()->save($documentKeyword);
						}
					}
				}else{
					DocKeywords::where(['doc_id'=>$id])->delete();
				}
			}else{
				DocKeywords::where(['doc_id'=>$id])->delete();
			}
			$messElemnt = MessageElements::_toHtml([
				MessageElements::addSuccess('Cập tài liệu "'.$postForm['title'].'" thành công')
			]);
			return \redirect('/backend/document/')->with('messElemnt',$messElemnt);
		}
		
	}

}