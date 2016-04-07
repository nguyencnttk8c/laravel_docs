<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Helpes\Backend\Functions;
use App\Helpes\Backend\MessageElements as MessageElements;

class TransactionController extends ResoureController
{
	protected $_titleIndex = 'Quản lý giao dịch';
	protected $_urlAndFormView = 'transaction';
	protected $_routeEdit = 'Backend::transactionEdit';
	protected $_titleEdit = 'Cập nhật giao dịch ID = ';
	protected $_titleNew = 'Thêm mới giao dịch';

	public function __construct(\App\Models\Transaction $model){
		 $this->_model = $model;

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