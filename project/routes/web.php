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
    $result = \Illuminate\Support\Facades\DB::table('Course')->select(array('Course.*', 'User.*', DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
        ->join('User', 'Course.uid', '=', 'User.uid')
        ->paginate(6);
    return view('index', compact('result'));
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


Route::group(['prefix' => 'course'], function () {

    Route::get('/{id}', 'CoursesController@showCourseDetail')->name('course_detail');
    Route::post('register/{id}', 'CourseRegistrationController@registerCourse')->name('buy_course');
    Route::get('/register-course/{id}', 'CourseRegistrationController@goToBuyCourse')->name('course-reg');
    Route::get('/join-course/{id}', 'JoinCourseController@showViewCourse')->name('join-course');

});

Route::group(['prefix' => 'groups'], function () {
    Route::get('/', 'GroupMemberController@showGroups')->name('group_page');

    Route::get('/{groupId}', 'GroupMemberController@showMyGroup')->name('my_group');
});

Route::get('test', 'UserController@connect');
Route::get('test2', 'CoursesController@showAllCourses');

Route::post('login', 'Auth\LoginController@postLogin')->name('post_login');


Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/{id}/courses', 'CoursesController@showAllCoursesUser')->name('user-courses');
    Route::get('/{id}/profile', 'ProfileController@showProfileUser')->name('user-profile');
});

Route::group(['prefix' => 'admin-cp'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('members/search', 'UserController@searchUser')->name('search');

    Route::get('members/delete/{uid}', 'UserController@deleteUser')->name('delete_User');

    Route::get('member/edit-member/{uid}', 'UserController@getEditUser')->name('get_edit_User');

    Route::post('member/edit-member/{uid}', 'UserController@postEditUser')->name('post_edit_User');

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

        Route::get('document_management', 'DocumentController@showAllDocuments')->name('document_management');
        Route::get('search_document', 'DocumentController@searchDocument')->name('search_document');
        Route::post('document_management/edit_document/{id}','DocumentController@postEditDocument')->name('post_edit_document');
        Route::get('document_management/edit_document/{id}','DocumentController@getEditDocument')->name('edit_document');
        Route::get('document_management/delete_document/{id}','DocumentController@deleteDocument')->name('delete_document');
        Route::get('document_management/add_doccumeny','DocumentController@getAddDocument')->name('add_doccument');
        Route::post('document_management/add_doccumeny','DocumentController@postAddDocument')->name('post_add_document');
        Route::get('charts', function () {
            return view('admin.charts');
        })->name('charts');

        Route::get('forms', function () {
            return view('admin.forms');
        })->name('forms');

        Route::get('courses', 'CoursesController@showCoursesPag')->name('admin-courses');

        Route::get('members/search', 'UserController@searchUser')->name('search');

        Route::group(['prefix' => 'groups'], function () {
            Route::get('/', 'Admin\GroupUserController@showAllGroupUser')->name('group-user');
        });

    });


});


Route::post('register', 'RegisterController@regis');

Route::get('user/activation/{token}', 'RegisterController@activateUser')->name('user.activate');




