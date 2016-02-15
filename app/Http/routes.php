<?php

use Illuminate\Http\Request;

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
    echo exec("git pull whplay master");
});

Route::post('github', function (Request $request) {
    echo exec("git pull whplay master");
});

Route::get('/', 'Wechat\WechatInitialController@checkSignature');