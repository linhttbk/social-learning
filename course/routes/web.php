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
    return "Course Service";
});

Route::get('test', 'Controller@index');
Route::get('test2', 'Controller@test');

Route::group(['prefix' => 'user'], function () {
    Route::get('/{id}/courses', 'CourseController@showAllCourses');
    Route::get('/{id}/courses2', 'CourseController@getAllCourses');

});
