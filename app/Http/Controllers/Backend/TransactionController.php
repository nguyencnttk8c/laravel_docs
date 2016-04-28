<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Helpes\Backend\Functions;
use App\Helpes\Backend\MessageElements as MessageElements;
use DB;
use App\Models\Customer;

class TransactionController extends ResoureController
{
	protected $_titleIndex = 'Quản lý giao dịch';
	protected $_urlAndFormView = 'transaction';
	protected $_routeEdit = 'Backend::transactionEdit';
	protected $_titleEdit = 'Cập nhật giao dịch ID = ';
	protected $_titleNew = 'Thêm mới giao dịch';

	public function __construct(\App\Models\Transaction $model){
		 $this->_model = $model;
		 $this->_search =  \App\Helpes\Backend\Functions::showDataSetup([
            'table'=> $model::where('id','!=',''),
            'per_page'=> 10,
            'url'=>'/backend/transaction'
            ]
        );

	}

	public function dataProvider($id){
		return [
			"authors" => Customer::where('status',1)->where('role','!=','admin')->lists('name','id'),
			'frmSearch' => true,
		];
	}

	public function postEdit(\Request $request = null, $id = null){

		if(isset(\Request::input()['data'])){
			$postForm = \Request::input()['data'];
			$postForm['trading_date'] = str_replace(['AM','PM'], '', $postForm['trading_date']);
			$params = [
				'status'=>($id)?'update':'insert',
				'datas'=>$postForm,
				'table'=> $this->_model
			];
			if($id){
				$params['id'] = $id;
			}
			Functions::IUD($params);

			DB::update("UPDATE ".DB::getTablePrefix()."customer_finance SET balance = balance + ".$postForm['amount_money']." WHERE id =".$postForm['owner_id']);
			
			$messElemnt = MessageElements::_toHtml([
				MessageElements::addSuccess('Cập nhật dữ liệu thành công')
			]);
			return \redirect('/backend/transaction/')->with('messElemnt',$messElemnt);
		}
		
	}

}