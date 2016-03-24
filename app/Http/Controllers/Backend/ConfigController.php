<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\ConfigBackend\Config;
class ConfigController extends Controller
{
	protected function getIndex(){
		$data = [
			'title' => 'Cấu hình website',
			'element' => $this->selectElement(),
		];
		return view('backend.config.form',['data'=>$data]);
	}

	protected function selectElement(){
		$configs = Config::publish()->get();
		$html = '';
		if($configs->count()){
			foreach($configs as $config){
				switch ($config->type) {
					case 'editor':
						$html .= $this->_eEditor($config);
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

	}
	
	protected function _eFile($config){

	}	

	protected function _eText($config){
		extract(
			$this->getAttibutesElement($config->attributes,
			['longText','placeholder'])
		);
		$html = "<div class=\"form-group\">
			<label class=\"col-sm-3 control-label no-padding-right\" for=\"form-field-1\">".$config->label."</label>
			<div class=\"col-sm-9\">
				<input name=\"config[".$config->name."]\"
				type=\"text\" ".(($longText)?'class=\"col-xs-10 col-sm-5\"':NULL)."  
				".(($placeholder)?'placeholder="'.$placeholder.'"':NULL)."
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