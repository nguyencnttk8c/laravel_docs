<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    route::get('login',['as'=>'loginBackend','uses'=>'Auth\AuthController@getLogin']);
    route::post('login',['as'=>'loginBackend','uses'=>'Auth\AuthController@postLogin']);
    Route::group(['prefix' => 'backend'], function () {
    	route::get('dashboard',['as'=>'Backend::dashboard','uses'=>'Backend\DashboardController@getIndex']);
    	route::get('config',['as'=>'Backend::config','uses'=>'Backend\ConfigController@getIndex']);
	});
    Route::controller('thong-tin-ca-nhan', 'Account\PersonalInformation');
});
