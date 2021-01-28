<?php

use App\Http\Controllers\admin\OrderController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


Route::get('/admin/login','admin\AuthController@login');
Route::post('/admin/login','admin\AuthController@doLogin')->name('admin.login');

Route::group(['prefix' => 'admin','namespace'=>'admin','as'=>'admin.','middleware'=>'Admin'], function () {
      Route::get('/','PageController@index');
      Route::resource('/category','CategoryController');
      Route::resource('/product', 'ProductController');
      Route::get('/order/pending','OrderController@pending')->name('order.pending');
      Route::get('/order/confirm/{id}','OrderController@confirm')->name('order.confirm');
      Route::get('/order/complete','OrderController@complete')->name('order.complete');
      Route::get('/user/list','UserController@index')->name('user.list');
      Route::get('/dashbord','UserController@dashboard')->name('name.dashborad');
      Route::get('/logout','UserController@Logout')->name('logout');
});

// !-- Route for User

Route::group(['middleware'=>'ShareData'],function(){
    Route::get('/','PageController@index');
    Route::get('/product/category/{slug}','PageController@byCategory');
    Route::get('/product/search','PageController@search');

    Route::get('/detail/{slug}','PageController@productDetail');
    Route::get('/product/card/add/{slug}','PageController@addToCard');

    Route::get('/login','user\AuthController@getLogin');
    Route::post('/login','user\AuthController@postLogin')->name('user.login');

    Route::get('/register','user\AuthController@getRegister');
    Route::post('/register','user\AuthController@postRegister')->name('user.register');

    Route::get('/logout','user\AuthController@logout');

    Route::get('/cart','PageController@cart');
    Route::get('/order/make','PageController@makeOrder')->name('user.makeorder');

    Route::get('/order/pending','PageController@pendingOrder');
    Route::get('/order/confirm','PageController@confirmOrder');

    Route::get('/info','PageController@info');
    Route::post('/info','PageController@infoChange');
});
