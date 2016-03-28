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
			'list'=>Taxonomy::orderBy('created_at','DESC')->paginate(10),
			'url'=>'taxonomy/new',
		];
		return view('backend.taxonomy.gird',['data'=>$data]);
	}
	public function getNew(){
		return $this->getEdit();
	}
	public function postNew(){
		return $this->postEdit();
	}
	public function getEdit(\Request $request = null, $id = null){

		$currentRoute = \Request::route()->getName();
		if($currentRoute == 'Backend::taxonomyEdit' && !$id){
			return;
		}
		$data = [
			'title'=> ($id)?'Chỉnh sửa danh mục':'Thêm mới danh mục',
			'optionsCategory' => $this->category(($id)?Taxonomy::find($id)->parent:''),
			'url'=>'taxonomy',
		];
		if($id){
			$data['current'] = Taxonomy::find($id);
		}
		return view('backend.taxonomy.form',['data'=>$data]);
	}

	public function postEdit(\Request $request = null, $id = null){
		if(isset(\Request::input()['data'])){
			$postForm = \Request::input()['data'];
			if(isset($postForm['tax_name'])){
				if(!$postForm['slug']){
					$postForm['slug'] = str_slug(\Request::input()['data']['tax_name']);
				}else{
					$postForm['slug'] = str_slug(\Request::input()['data']['slug']);
				}
			}
			$params = [
				'status'=>($id)?'update':'insert',
				'datas'=>$postForm,
				'table'=> new Taxonomy
			];
			if($id){
				$params['id'] = $id;
			}
			Functions::IUD($params);
			$messElemnt = MessageElements::_toHtml([
				MessageElements::addSuccess('Cập nhật tên danh mục "'.$postForm['tax_name'].'" thành công')
			]);
			return \redirect('/backend/taxonomy/')->with('messElemnt',$messElemnt);
		}
		
	}

	public function category($selected = ''){
		$result = Taxonomy::get();
		
		$menuData = [];
		foreach($result as $value){
		    $menuData['items'][$value->id] = $value;
		    $menuData['parent'][$value->parent][] = $value->id;
	 	}
	 	return $this->selectMenu(0,$menuData,'--',$selected);
	}

	function selectMenu($parent,$menuData,$text="--",$selected = ''){
        $html="";
        if(isset($menuData['parent'][$parent])){
            foreach($menuData['parent'][$parent] as $value){
                $html.="<option ".(($selected && $selected == $value)?'selected':NULL)." value='{$value}'>";
                $html.=$text.$menuData['items'][$value]->tax_name;
                $html.="</option>";
                $html.= $this->selectMenu($value,$menuData,$text."--");
            }
        }
        return $html;
 	}

}