<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use App\Models\Customer;
class AjaxController extends Controller
{
	public function postDeleteRecord(){
		extract(\Request::input());
		if($table && $id){
			$model = '';
			switch ($table) {
				case 'taxonomy':
					$model = new Taxonomy;
					break;
				case 'customers':
					$model = new Customer;
					break;	
			}
			if($model && $id){
				$model->find($id)->delete();
				return 1;
			}else{
				return 0;
			}
		}
		
	}
}