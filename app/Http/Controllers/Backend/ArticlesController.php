<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\CustomerFinance;
use App\Helpes\Backend\Functions;
use App\Helpes\Backend\MessageElements as MessageElements;

class ArticlesController extends ResoureController
{
	protected $_titleIndex = 'Quản lý bài viết';
	protected $_urlAndFormView = 'articles';
	protected $_routeEdit = 'Backend::articlesEdit';
	protected $_titleEdit = 'Cập nhật bài viết ID = ';
	protected $_titleNew = 'Thêm mới bài viết';

	public function __construct(\App\Models\Articles $model){
		 $this->_model = $model;
	}
	
	public function dataProvider($id){
		return [
			"categories" => \App\Models\Taxonomy::where('type','article')->lists('tax_name','id'),
		];
	}

	public function postEdit(\Request $request = null, $id = null){
		if(isset(\Request::input()['data'])){
			$postForm = \Request::input()['data'];
			if(isset($postForm['title'])){
				if(!isset($postForm['slug']) || isset($postForm['slug']) && empty($postForm['slug'])){
					$postForm['slug'] = str_slug(\Request::input()['data']['title']);
				}else{
					$postForm['slug'] = str_slug(\Request::input()['data']['slug']);
				}
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
			
			$messElemnt = MessageElements::_toHtml([
				MessageElements::addSuccess('Cập nhật bài viết "'.$postForm['title'].'" thành công')
			]);
			return \redirect('/backend/articles/')->with('messElemnt',$messElemnt);
		}
		
	}

}