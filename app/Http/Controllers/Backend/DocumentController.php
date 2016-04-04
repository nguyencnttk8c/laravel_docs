<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Helpes\Backend\Functions;
use App\Helpes\Backend\MessageElements as MessageElements;

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
		];
	}

	public function postEdit(\Request $request = null, $id = null){

		if(isset(\Request::input()['data'])){
			$postForm = \Request::input()['data'];
			$params = [
				'status'=>($id)?'update':'insert',
				'datas'=>$postForm,
				'table'=> $this->_model
			];
			if($id){
				$params['id'] = $id;
			}
			Functions::IUD($params);
			$document = $this->_model->find($id);

			if(isset(\Request::input()['keywords'])){
				$keywords = explode(',',\Request::input()['keywords']);
				if($keywords){
					foreach($keywords as $key){
						$key = trim($key);
						$documentKeyword = $document->Document ?: new \App\DocKeywords;
						$documentKeyword->key_word = $key;
						$document->DocKeywords()->save($documentKeyword);
					}
				}
			}
			$messElemnt = MessageElements::_toHtml([
				MessageElements::addSuccess('Cập tài liệu "'.$postForm['title'].'" thành công')
			]);
			return \redirect('/backend/document/')->with('messElemnt',$messElemnt);
		}
		
	}

}