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
	protected $_search;
	
	public function getIndex(){
		$data = [
			'title'=> $this->_titleIndex,
			'url'=>$this->_urlAndFormView.'/new',
		];
		if(method_exists($this, "dataProvider")){
			$data = array_merge($this->dataProvider(''),$data);
		}
		if(isset($data['frmSearch'])){
			$data['list'] = $this->_search['results'];
		}else{
			$data['list'] = $this->_model->orderBy('created_at','DESC')->paginate(10);
		}
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
		if(method_exists($this, "dataProvider")){
			$data = array_merge($this->dataProvider($id),$data);
		}
		
		return view('backend.'.$this->_urlAndFormView.'.form',['data'=>$data]);
	}
}