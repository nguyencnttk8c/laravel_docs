<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
	protected function getIndex(){
		$data = [
			'title'=>'Trang tổng quan',
		];
		return view('backend.layout.main',['data'=>$data]);
	}
}	