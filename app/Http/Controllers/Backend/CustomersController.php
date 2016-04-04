<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\CustomerFinance;
use App\Helpes\Backend\Functions;
use App\Helpes\Backend\MessageElements as MessageElements;

class CustomersController extends ResoureController
{
	protected $_titleIndex = 'Quản lý người dùng';
	protected $_urlAndFormView = 'customers';
	protected $_routeEdit = 'Backend::customersEdit';
	protected $_titleEdit = 'Cập nhật thông tin người dùng ID = ';
	protected $_titleNew = 'Thêm mới người dùng';

	public function __construct(\App\Models\Customer $model){
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
				MessageElements::addSuccess('Cập nhật người dùng "'.$postForm['name'].'" thành công')
			]);
			return \redirect('/backend/customers/')->with('messElemnt',$messElemnt);
		}
		
	}

}