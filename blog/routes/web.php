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
//    return "hello,word";
})->name('login');
Route::get('/hello', function () {
//    return view('welcome');
      return "hello,word".route('hello',[5]);
});
Route::get('list/{id?}',function($id = 1){
    return url("/list/$id");
})->where('id', '[0-9]')->name('hello');
Route::get('user/{id}', function ($id) {
    return "用户ID: " . $id;
});
/*group 打包组*/
Route::middleware('auth')->prefix('login')->group(function () {/*auth中间件，如果没登录，则跳转name为login的页面*/
    Route::get('dashboard', function () {/*prefix 增加路由前缀 如'login/dashboard*/
        return 'dashboard';
    });
    Route::get('account', function () {
        return view('account');
    });
});

Route::domain('api.melodylaravel.com')->group(function () {
    Route::get('/', function () {
        return 123;
        // 处理 api.melodylaravel.com
    });
});

Route::get('/Controller', 'NameController@index');
// App\Http\Controllers\NameController 的index方法
Route::namespace('Admin')->group(function() {/*namespace 增加命名空间*/
    // App\Http\Controllers\Admin\AdminController 的index方法
    Route::get('/admin', 'AdminController@index');
});
Route::get('name/create', 'NameController@create');
Route::post('name/create', 'NameController@create');
