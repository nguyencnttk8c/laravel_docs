<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Document;
use App\Models\Customer;
use App\Models\Articles;
use App\Models\Transaction;
class DashboardController extends Controller
{
	protected function getIndex(){
		$data = [
			'transactionsList' =>  Transaction::where('trading_status','!=',0)->take(5)->get(),
			'articles' => Articles::where('status',1)->count(),
			'documents' => Document::all()->count(),
			'customers' => Customer::where('status',1)->where('role','!=','admin')->count(),
			'transactions' => Transaction::where('trading_status',1)->count(),
			'title'=>'Trang tổng quan',
		];
		return view('backend.dashboard.overview',['data'=>$data]);
	}

	public static function calculation($percentage){
		$totalWidth = Articles::where('status',1)->count() + Document::all()->count() + Customer::where('status',1)->where('role','!=','admin')->count() + Transaction::where('trading_status',1)->count();
		return ($percentage / 100) * $totalWidth;
	}
}	