<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware'=>'jwt'],function(){

	    Route::post('logout', 'AuthController@logout');
	    Route::post('refresh', 'AuthController@refresh');
	    Route::post('me', 'AuthController@me');
	    Route::get('get-admin-details', 'AdminController@admin_details');
	    Route::get('get-managers-list', 'ManagerController@managers_list');
	    Route::get('get-customers-list', 'CustomerController@customers_list');
	    Route::get('get-manager-profile-details', 'ManagerController@get_manager_details');
	    Route::get('get-customer-profile-details', 'CustomerController@get_customer_details');
	    Route::get('admin','AdminController@admin_dashboard')->middleware('admin');
	    Route::get('manager','ManagerController@manager_dashboard')->middleware('manager');
	    Route::get('customer','CustomerController@customer_dashboard')->middleware('customer');
    	
    });

});
