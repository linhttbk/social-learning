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

Route::get('courses', 'CoursesController@showAllCourses')->name('courses');


Route::group(['prefix' =>'course'],function (){

    Route::get('/{id}', 'CoursesController@showCourseDetail')->name('course_detail');
    Route::get('register/{id}','CourseRegistrationController@registerCourse')->name('register_course');

});

Route::get('test', 'UserController@connect');
Route::get('test2', 'CoursesController@showAllCourses');

Route::post('post-login', 'Auth\LoginController@postLogin')->name('post_login');


Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin-cp'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('members/search', 'UserController@searchUser')->name('search');

    Route::get('members/delete/{uid}', 'UserController@deleteUser')->name('delete_User');

    Route::get('member/get-edit-member', 'UserController@getEditUser')->name('get_edit_User');

    Route::get('member/post-edit-member', 'UserController@postEditUser')->name('post_edit_User');

    Route::get('login', function () {
        return view('admin.login');
    })->name('admin_login');

    Route::post('login', 'Admin\AuthController@postLogin')->name('post-login');

    Route::get('logout', 'Admin\AdminController@logout')->name('post-logout');

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

        Route::get('courses', function () {
            return view('admin.courses');
        })->name('admin-courses');

        Route::get('members/search', 'UserController@searchUser')->name('search');

        Route::group(['prefix' => 'groups'], function () {
            Route::get('/', 'Admin\GroupUserController@showAllGroupUser')->name('group-user');
        });

    });


});


Route::post('register', 'RegisterController@regis');

Route::get('user/activation/{token}', 'RegisterController@activateUser')->name('user.activate');



