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

Route::get('/', function () {
    return view('welcome');
});

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

    Route::get('category', function(){
        return view('shop.shop_category')->with([
        ]);
    });

    Route::post('github', function (Request $request) {
        Log::info($request->all());
    });

    Route::post('test', function (Request $request) {
        Log::info($request->all());
    });
});
