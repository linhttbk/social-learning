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
    return "Api-gateway project";
});
Route::get('test', function () {
    return "test fucntion";
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/{id}/courses', 'CourseController@showCourseById');

});
Route::group(['prefix' => 'admin'], function () {
    Route::get('checkLogin', 'UserController@checkLogin')->name('check-admin-login');
    Route::post('doLogin', 'UserController@doLogin')->name('check-admin-login');

});
Route::get('login', function () {
    return view('login');
});
