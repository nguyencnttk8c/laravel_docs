<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
class ConfigController extends Controller
{
	protected function getIndex(){
		$data = [
			'title' => 'Cấu hình website',
			'layout' => 'backend.config.form',
		];
		return view('backend.layout.main',['data'=>$data]);
	}
}	