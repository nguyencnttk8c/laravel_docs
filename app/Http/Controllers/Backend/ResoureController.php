<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

class ResoureController extends Controller
{
	protected $_titleIndex;
	protected $_urlAndFormView;
	protected $_routeEdit;
	protected $_titleEdit;
	protected $_titleNew;
	protected $_model;
	
	public function getIndex(){
		$data = [
			'title'=> $this->_titleIndex,
			'list'=>$this->_model->orderBy('created_at','DESC')->paginate(10),
			'url'=>$this->_urlAndFormView.'/new',
		];
		return view('backend.'.$this->_urlAndFormView.'.gird',['data'=>$data]);
	}
	public function getNew(){
		return $this->getEdit();
	}
	public function postNew(){
		return $this->postEdit();
	}
	public function getEdit(\Request $request = null, $id = null){
		$currentRoute = \Request::route()->getName();
		if($currentRoute == $this->_routeEdit && !$id){
			return;
		}
		$data = [
			'title'=> (($id)?$this->_titleEdit.$id:$this->_titleNew),
			'url'=>''.$this->_urlAndFormView.'',
		];
		if($id){
			$data['current'] = $this->_model->find($id);
		}
		return view('backend.'.$this->_urlAndFormView.'.form',['data'=>$data]);
	}
}