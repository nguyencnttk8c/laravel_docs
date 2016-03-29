<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\ConfigBackend\Config;
use DB;
use App\Helpes\Backend\MessageElements as MessageElements;
class ConfigController extends Controller
{
	protected function getIndex(){
		$data = [
			'title' => 'Cấu hình website',
			'element' => $this->selectElement(),
		];
		return view('backend.config.form',['data'=>$data]);
	}

	public function postIndex(){
		if(isset(\Request::input()['config'])){
			$requestForm = \Request::input()['config'];
			$query = '';
			$table = new \App\Models\ConfigBackend\Config;
			$table = DB::getTablePrefix().$table->getTable();
			foreach($requestForm as $name=>$value){
				$query .= "UPDATE $table SET value_vi = '$value' where name='$name';";
			}
			DB::unprepared($query);
		}
		
		$data = [
			'title' => 'Cấu hình website',
			'element' => $this->selectElement(),
			'messElemnt' => MessageElements::_toHtml([
				MessageElements::addSuccess('Cập nhật dữ liệu thành công')
			])
		];
		return view('backend.config.form',['data'=>$data]);
	}

	protected function selectElement(){
		$configs = Config::publish()->orderBy('order','ASC')->get();
		$html = '';
		if($configs->count()){
			foreach($configs as $config){
				switch ($config->type) {
					case 'editor':
						$html .= $this->_eEditor($config);
						break;
					case 'textarea':
						$html .= $this->_eTextarea($config);
						break;
					case 'file':
						$html .= $this->_eFile($config);
						break;

					case 'text':
						$html .= $this->_eText($config);
						break;	
				}
			}
		}
		return $html;
	}

	protected function _eEditor($config){
		$html = "<div class=\"form-group\">
			<label class=\"col-sm-2 control-label no-padding-right\" for=\"form-field-1\">".$config->label."</label>
			<div class=\"col-sm-10\">
				<textarea class=\"content-editor\" name=\"config[".$config->name."]\"
				type=\"text\" >".$config->value_vi."</textarea>
			</div>
		</div>";
		return $html;
		
	}
	
	protected function _eFile($config){
		$html = "<div class=\"form-group\">
		<label class=\"col-sm-2 control-label no-padding-right\" for=\"form-field-1\">".$config->label."</label>
			<div class=\"col-sm-10\">
				<label class=\"ace-file-input\">
				  <input type=\"file\" name=\"".$config->name."\" class=\"ace-input-file\">
				  <span class=\"ace-file-container\" data-title=\"Lựa chọn\">
				    <span class=\"ace-file-name\" data-title=\"Không có tập tin nào được chọn ...\">
				      <i class=\" ace-icon fa fa-upload\">
				      </i>
				    </span>
				  </span>
				  <a class=\"remove\" href=\"#\">
				    <i class=\" ace-icon fa fa-times\">
				    </i>
				  </a>
				</label>
			</div>
		</div>";		
		return $html;

	}	

	protected function _eTextarea($config){

		$html = "<div class=\"form-group\">
			<label class=\"col-sm-2 control-label no-padding-right\" for=\"form-field-1\">".$config->label."</label>
			<div class=\"col-sm-10\">
				<textarea class=\"col-sm-12\" name=\"config[".$config->name."]\"
				type=\"text\" >".$config->value_vi."</textarea>
			</div>
		</div>";
		return $html;
	}	

	protected function _eText($config){
		extract(
			$this->getAttibutesElement($config->attributes,
			['longText','placeholder'])
		);
		$html = "<div class=\"form-group\">
			<label class=\"col-sm-2 control-label no-padding-right\" for=\"form-field-1\">".$config->label."</label>
			<div class=\"col-sm-10\">
				<input name=\"config[".$config->name."]\"
				type=\"text\" class=\"col-xs-12 col-sm-12\"  
				".(($placeholder)?'placeholder="'.$placeholder.'"':NULL)."
				value=\"".$config->value_vi."\"
				/>
			</div>
		</div>";
		return $html;
	}	

	public function getAttibutesElement($attibutes,$keys){

		$attibutes = (array) json_decode($attibutes); 

		$results = [];
		foreach($keys as $key){
			if(isset($attibutes[$key]) && $attibutes[$key]){
				$results[$key] = $attibutes[$key];
			}else{
				$results[$key] = '';
			}
		}
	
		return $results;
	}
}	