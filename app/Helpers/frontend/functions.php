<?php
namespace Helpers\Frontend;

class Functions {
	public static function test(){
		dd(123);
	}

	public static function makeRandomString($chars = 20) {
		$letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($letters), 0, $chars);
	}
}