<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
	protected function getIndex(){
		return view('backend.layout.dashboard');
	}
}	