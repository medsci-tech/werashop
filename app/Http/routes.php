<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

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
    Route::get('shop', function(){
        return view('shop.shop_index')->with([
        ]);
    });

    Route::get('shop_category', function(){
        return view('shop.shop_category')->with([
        ]);
    });

    Route::get('shop_cart', function(){
        return view('shop.shop_cart')->with([
        ]);
    });

    Route::get('shop_order', function(){
        return view('shop.shop_order')->with([
        ]);
    });

    Route::get('shop_person', function(){
        return view('shop.shop_person')->with([
        ]);
    });

    Route::get('shop', function(){
        return view('shop.shop_index')->with([
        ]);
    });



    Route::get('shop_person', function(){
        return view('shop.shop_person')->with([
        ]);
    });
});

//github回调事件推送
Route::get('github', function (Request $request) {
    exec("git pull whplay master");
});

Route::post('github', function (Request $request) {
    exec("git pull whplay master");
});

Route::get('/', 'Wechat/WechatInitialController@checkSignature');