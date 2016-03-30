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
    Route::group(['prefix' => 'backend'], function () {
    	route::get('login',['as'=>'loginBackend','uses'=>'Auth\AuthController@getLogin']);
    	route::post('login',['as'=>'loginBackend','uses'=>'Auth\AuthController@postLogin']);
    	route::get('dashboard',['as'=>'Backend::dashboard','uses'=>'Backend\DashboardController@getIndex']);
    	route::get('config',['as'=>'Backend::config','uses'=>'Backend\ConfigController@getIndex']);
    	route::post('config',['as'=>'Backend::config','uses'=>'Backend\ConfigController@postIndex']);
        route::controller('ajax','Backend\AjaxController');
        
    	route::controller('taxonomy','Backend\TaxonomyController',[
    		'getIndex' => 'Backend::taxonomy',
            'getEdit' => 'Backend::taxonomyEdit',
            'getNew' => 'Backend::taxonomyNew',
    	]);

        route::controller('customers','Backend\CustomersController',[
            'getIndex' => 'Backend::customers',
            'getEdit' => 'Backend::customersEdit',
            'getNew' => 'Backend::customersNew',
        ]);
	});
    Route::controller('thong-tin-ca-nhan', 'Account\PersonalInformation');

    Route::group(['prefix' => '/'], function(){
        Route::get('/', 'Frontend\HomeController@getIndex');
    	Route::get('dang-ky', ['as' => 'getRegister', 'uses' => 'Frontend\AuthCustomerController@getRegister']);
    	Route::post('dang-ky', ['as' => 'postRegister', 'uses' => 'Frontend\AuthCustomerController@postRegister']);
    	Route::get('dang-nhap', ['as' => 'getLogin', 'uses' => 'Frontend\AuthCustomerController@getLogin']);
    	Route::post('dang-nhap', ['as' => 'postLogin', 'uses' => 'Frontend\AuthCustomerController@postLogin']);
        Route::get('dang-xuat', 'Frontend\AuthCustomerController@getLogout');
    });

    Route::get('upload-tai-lieu', 'Account\Upload@getUpload');
    Route::post('/dropzone/uploadFiles', 'Account\Upload@uploadFiles');
});
