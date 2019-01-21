<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', 'Auth\RegisterController@getRegister')->name('getRegister');
Route::post('register', 'Auth\RegisterController@postRegister')->name('postRegister');
Route::get('login', 'Auth\LoginController@getLogin')->name('getLogin');
Route::post('login', 'Auth\LoginController@postLogin')->name('postLogin');
Route::get('forgot', 'Auth\ForgotPasswordController@getForgot')->name('getForgot');
Route::post('forgot', 'Auth\ForgotPasswordController@postForgot')->name('postForgot');
Route::get('active', 'Auth\RegisterController@getActive')->name('getActive');
Route::post('active', 'Auth\RegisterController@getActive')->name('getActive');
Route::get('logout', 'Auth\LoginController@getLogout')->name('getLogout');

Route::group(['prefix' => 'system','middleware'=>'login'], function () {
    Route::get('/', 'System\DashboardController@getDashboard')->name('getDashboard');
    Route::get('member', 'System\UserController@getUser')->name('getUser');
    Route::get('statistic', 'System\DashboardController@getStatistic')->name('getStatistic');

    Route::group(['prefix'=>'tools'], function(){
        Route::get('backup', 'System\ToolsController@getXShopee')->name('getXShopee');
        Route::get('mshopee', 'System\ToolsController@getMShopee')->name('getMShopee');
        Route::get('keyword', 'System\ToolsController@getKeyWord')->name('getKeyWord');
        Route::get('spy', 'System\ToolsController@getSpy')->name('getSpy');
    });
});