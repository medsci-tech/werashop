<?php

use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => 'shop', 'namespace' => 'Shop'], function () {
        Route::get('/', 'ShopController@index');
        Route::get('category', 'ShopController@category');
    });

    Route::group(['prefix' => 'cart', 'namespace' => 'Cart'], function () {
        Route::get('/', 'CartController@index');
    });

    Route::group(['prefix' => 'personal', 'namespace' => 'Personal'], function () {
        Route::get('/', 'PersonalController@index');
    });

    Route::group(['prefix' => 'order', 'namespace' => 'Order'], function () {
        Route::get('/list', 'OrderController@list');
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