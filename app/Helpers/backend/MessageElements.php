<?php
namespace App\Helpes\Backend;
class MessageElements{
	
	public static function addSuccess($msg = NULL){
		return "<div class=\"alert alert-success\">
		  <i class=\"ace-icon fa fa-check-circle\">
		  </i>
		  ".$msg."
		  <button class=\"close\" data-dismiss=\"alert\">
		    <i class=\"ace-icon fa fa-times\">
		    </i>
		  </button>
		</div>";
	}

	public static function _toHtml($elements = []){
		if($elements){
			$html = '';
			foreach($elements as $e){
				$html .= $e;
			}
			return $html;
		}
	}
}