<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Taxonomy;
use App\Helpes\Backend\Functions;
use App\Helpes\Backend\MessageElements as MessageElements;
class TaxonomyController extends Controller
{
	public function getIndex(){
		$data = [
			'title'=>'Quản lý danh mục',
		];
		return view('backend.layout.main',['data'=>$data]);
	}
	public function getNew(){
		return $this->getEdit();
	}
	public function getEdit(\Request $request = null, $id = null){
		$currentRoute = \Request::route()->getName();
		if($currentRoute == 'Backend::taxonomyEdit' && !$id){
			return;
		}
		$data = [
			'title'=> ($id)?'Chỉnh sửa danh mục':'Thêm mới danh mục',
			'optionsCategory' => $this->category(),
		];
		return view('backend.taxonomy.form',['data'=>$data]);
	}

	public function postEdit(\Request $request = null, $id = null){
		$data = [
			'title'=> ($id)?'Chỉnh sửa danh mục':'Thêm mới danh mục',
			'optionsCategory' => $this->category(),
		];
		if(isset(\Request::input()['data'])){
			$params = [
				'status'=>($id)?'update':'insert',
				'datas'=>\Request::input()['data'],
				'table'=> new Taxonomy
			];
			if($id){
				$params['id'] = $id;
			}

			Functions::IUD($params);
			$data['messElemnt'] = MessageElements::_toHtml([
				MessageElements::addSuccess('Cập nhật dữ liệu thành công')
			]);
		}
		return view('backend.taxonomy.form',['data'=>$data]);
	}

	public function category(){
		$result = Taxonomy::get();
		
		$menuData = [];
		foreach($result as $value){
		    $menuData['items'][$value->id] = $value;
		    $menuData['parent'][$value->parent][] = $value->id;
	 	}
	 	return $this->selectMenu(0,$menuData);
	}

	function selectMenu($parent,$menuData,$text="--"){
        $html="";
        if(isset($menuData['parent'][$parent])){
            foreach($menuData['parent'][$parent] as $value){
                $html.="<option value='{$value}'>";
                $html.=$text.$menuData['items'][$value]->tax_name;
                $html.="</option>";
                $html.= $this->selectMenu($value,$menuData,$text."--");
            }
        }
        return $html;
 	}

}