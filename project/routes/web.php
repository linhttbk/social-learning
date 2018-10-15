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

Route::post('login', 'Auth\LoginController@postLogin');

Route::get('logout', 'Auth\LoginController@getLogout');

Route::group(['prefix' => 'admin-cp'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');
//    Route::get('members', function () {
//        return view('admin.member');
//    })->name('members');
    Route::get('members', 'UserController@showAllUsers')->name('members');
    Route::get('charts', function () {
        return view('admin.charts');
    })->name('charts');
    Route::get('forms', function () {
        return view('admin.forms');
    })->name('forms');
});
