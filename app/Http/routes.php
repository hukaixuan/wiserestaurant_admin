<?php

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

//测试
Route::get('/test', 'TestController@index');
Route::get('/hello', function ()
{
    return 'hello';
});

Route::get('/download_client',function ()
{
    # code...
    return response()->download('download/apk/wiserestaurant.apk');
    // return view('welcome');
});
Route::get('download_admin',function(){
    return response()->download('');
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
    //
    
});


//后台管理路由
Route::group(['middleware' => ['web','auth'],'namespace' => 'Admin','prefix' => 'admin'], function() {  
    // Route::auth();
    Route::get('/', 'AdminController@index');
    Route::resource('good', 'GoodController');
    Route::resource('other', 'GoodController@other');
    Route::get('get_good_by_type/{type_id}', 'GoodController@get_good_by_type');
    Route::get('get_good_by_category/{category_id}', 'GoodController@get_good_by_category');
    Route::get('seat/create_a_qrcode/{seat_id}','SeatController@create_a_qrcode');
    Route::get('seat/create_qrcodes','SeatController@create_qrcodes');
    Route::resource('seat','SeatController');
    Route::resource('type','TypeController');
    Route::resource('category','CategoryController');
    Route::resource('package','PackageController');
    // Route::get('login', 'AuthController@getLogin');
    // Route::post('login', 'AuthController@postLogin');
    // Route::get('register', 'AuthController@getRegister');
    // Route::post('register', 'AuthController@postRegister');
    // Route::any('logout', 'AuthController@logout');
});



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
