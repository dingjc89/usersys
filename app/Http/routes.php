<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/','LoginController@index');
    Route::post('login','LoginController@login');
    Route::get('logout','LoginController@logout');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'FilterView'],function(){
    //  首页
   Route::get('home','HomeController@index');
   //   用户
   Route::get('user','UserController@index');
   Route::get('user/add','UserController@add');
   Route::post('user/store','UserController@store');
   Route::get('user/edit/{id}','UserController@edit')->where(['id'=>'[0-9]+']);
   Route::post('user/del','UserController@del');
   //   角色
   Route::get('role','RoleController@index');
   Route::get('role/add/{id?}','RoleController@add');
   Route::post('role/store','RoleController@store');
   Route::post('role/del','RoleController@del');
   Route::get('role/edit/{id}','RoleController@edit')->where(['id'=>'[0-9]+']);
   Route::post('role/update/{id}','RoleController@update')->where(['id'=>'[0-9]+']);
});