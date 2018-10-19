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
    return view('index');
})->name('home');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('course', function () {
    return view('course');
})->name('course');

Route::get('courses', function () {
    return view('courses');
})->name('courses');
Route::get('test', 'UserController@connect');

Route::post('post-login', 'Auth\LoginController@postLogin')->name('post_login');


Route::get('logout', 'Auth\LoginController@getLogout')->name('logout');

Route::group(['prefix' => 'admin-cp'], function () {
    Route::get('login', function () {
        return view('admin.login');
    })->name('admin_login');

    Route::post('login', 'Admin\AuthController@postLogin')->name('post-login');


    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin');
        Route::get('members', 'UserController@showAllUsers')->name('members');
        Route::get('charts', function () {
            return view('admin.charts');
        })->name('charts');
        Route::get('forms', function () {
            return view('admin.forms');
        })->name('forms');
        Route::get('members/search', 'UserController@searchUser')->name('search');
    });


});
Route::post('register', 'RegisterController@regis');

Route::get('user/activation/{token}', 'RegisterController@activateUser')->name('user.activate');



