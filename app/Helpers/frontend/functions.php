<?php
namespace Helpers\Frontend;

use App\DocMeta;

class Functions {
	public static function test(){
		dd(123);
	}

	public static function makeRandomString($chars = 20) {
		$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($letters), 0, $chars);
	}

	public static function getDocMeta($id, $field) {
		$query = DocMeta::where('doc_id', $id)->first();

		if (count($query) > 0) {
			return $query->$field;
		} else {
			return 0;			
		}
	}

	public static function getDocIcon($type = null) {		
		switch ($type) {
			case 'pdf':
				$icon = 'type-pdf';
				break;

			case 'ppt':
				$icon = 'type-ppt';
				break;

			case 'pptx':
				$icon = 'type-ppt';
				break;

			case 'xls':
				$icon = 'type-excel';
				break;

			case 'xlsx':
				$icon = 'type-excel';
				break;

			default:
				$icon = 'type-doc';
				break;
		}

		return $icon;
	}
}