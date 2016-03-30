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
	
	public function postEdit(\Request $request = null, $id = null){
		if(isset(\Request::input()['data'])){
			$postForm = \Request::input()['data'];
			if(isset($postForm['password']) && $postForm['password']){
				$postForm['password'] = bcrypt($postForm['password']);
			}else{
				unset($postForm['password']);
			}
			$params = [
				'status'=>($id)?'update':'insert',
				'datas'=>$postForm,
				'table'=> $this->_model
			];
			if($id){
				$params['id'] = $id;
			}
			Functions::IUD($params);
			$customer = $this->_model->find($id);
			$CustomerFinance = $customer->CustomerFinance ?: new CustomerFinance;
			$CustomerFinance->balance = (isset(\Request::input()['meta']) && \Request::input()['meta']['balance'] )?\Request::input()['meta']['balance']:0;
			$customer->CustomerFinance()->save($CustomerFinance);
			$messElemnt = MessageElements::_toHtml([
				MessageElements::addSuccess('Cập tài liệu "'.$postForm['name'].'" thành công')
			]);
			return \redirect('/backend/document/')->with('messElemnt',$messElemnt);
		}
		
	}

}