/<?php

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
Route::get('xx',function (){
    return 'project';
});
Route::get('/', function () {
    $result = \Illuminate\Support\Facades\DB::table('Course')->select(array('Course.*', 'User.*', DB::raw('(Select Count(CourseRegistration.id_course) from CourseRegistration where CourseRegistration.id_course = Course.id) as count_student')))
        ->join('User', 'Course.uid', '=', 'User.uid')
        ->paginate(6);
    $teachers = \App\Models\User::where('type', 1)->limit(4)->get();
    return view('index', ['result' => $result, 'teachers' => $teachers]);
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

Route::get('document', 'DocumentController@showDocument')->name("document");

Route::get('course', function () {
    return view('course');
})->name('course');

Route::get('courses', 'CoursesController@showAllCourses')->name('courses');


Route::group(['prefix' => 'course'], function () {

    Route::get('/{id}', 'CoursesController@showCourseDetail')->name('course_detail');
    Route::get('registered/{id}', 'CoursesController@showCourseDetailRegistered')->name('course_detail_registered');
    Route::post('register/{id}', 'CourseRegistrationController@registerCourse')->name('buy_course');
    Route::get('/register-course/{id}', 'CourseRegistrationController@goToBuyCourse')->name('course-reg');
    Route::get('/join-course/{id}', 'JoinCourseController@showViewCourse')->name('join-course');
    Route::get('/join-course/{id}/{id_chap}/quiz/{id_quiz}', 'QuizController@showQuiz')->name('do-quiz');
    Route::post('submit', 'QuizController@submitQuiz')->name('submit-quiz');


});

Route::group(['prefix' => 'groups'], function () {
    Route::get('/', 'GroupMemberController@showGroups')->name('group_page');

    Route::get('/{groupId}', 'GroupMemberController@showMyGroup')->name('my_group');

    Route::post('create', 'GroupMemberController@create')->name('create_group');

    Route::get('/request/{id}', 'GroupMemberController@requestGroups')->name('request-group');

    Route::get('/cancel_request/{groupId}', 'GroupMemberController@cancelRequestGroup')->name('cancel-request');

    Route::get('/cancel_group/{groupId}', 'GroupMemberController@quitGroup')->name('cancel-group');

    Route::get('/{groupId}/settings', 'GroupMemberController@gotoSetting')->name('go-setting');

    Route::post('/{groupId}/post', 'GroupMemberController@postData')->name('my_post_data');
    Route::get('/{groupId}/user_group', 'GroupMemberController@showUserGroup')->name('user_my_group');

});

Route::get('test', function () {
    return view('welcome');
});
Route::get('test2', 'CoursesController@showAllCourses');

Route::post('login', 'Auth\LoginController@postLogin')->name('post_login');


Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/{id}/courses', 'CoursesController@showAllCoursesUser')->name('user-courses');
    Route::get('/{id}/profile', 'ProfileController@showProfileUser')->name('user-profile');
});

Route::group(['prefix' => 'admin-cp'], function () {




    Route::get('members/add', function () {
        return view('admin.member.add-member');
    })->name('add-member');
    Route::post('members/add-member', 'UserController@addUser')->name('add-user');
    Route::get('members/delete/{uid}', 'UserController@deleteUser')->name('delete_User');

    Route::get('member/edit-member/{uid}', 'UserController@getEditUser')->name('get_edit_User');

    Route::post('member/edit-member/{uid}', 'UserController@postEditUser')->name('post_edit_User');

    Route::get('login', function () {
        return view('admin.login');
    })->name('admin_login');

    Route::post('login', 'Admin\AuthController@postLogin')->name('post-login');

    Route::get('logout', 'Admin\AdminController@logout')->name('post-logout');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', 'Admin\AdminController@index')->name('admin');

        Route::get('members', 'UserController@showAllUsers')->name('members');

        Route::get('document_management', 'DocumentController@showAllDocuments')->name('document_management');
        Route::get('search_document', 'DocumentController@searchDocument')->name('search_document');
        Route::post('document_management/edit_document/{id}', 'DocumentController@postEditDocument')->name('post_edit_document');
        Route::get('document_management/edit_document/{id}', 'DocumentController@getEditDocument')->name('edit_document');
        Route::get('document_management/delete_document/{id}', 'DocumentController@deleteDocument')->name('delete_document');
        Route::get('document_management/add_doccumeny', 'DocumentController@getAddDocument')->name('add_doccument');
        Route::post('document_management/add_doccumeny', 'DocumentController@postAddDocument')->name('post_add_document');

        Route::get('course_plan','CoursesController@getCoursePlan')->name('course_plan');
        Route::post('course_plan','CoursePlanController@getCourseDetail')->name('search_course_plan');
        Route::get('courseplan/{$idcourse,$idchap}','CoursePlanController@getCoursePlanWith')->name('get_course_plan');

        Route::get('charts', function () {
            return view('admin.charts');
        })->name('charts');

        Route::get('forms', function () {
            return view('admin.forms');
        })->name('forms');

        Route::get('courses', 'Admin\CourseController@showCoursesPag')->name('admin-courses');
        Route::get('courses/search', 'Admin\CourseController@searchCourse')->name('search-courses');
        Route::get('courses/add-course','Admin\CourseController@showAddCourse')->name('add-courses');
        Route::post('courses/add-course','Admin\CourseController@addCourse')->name('add-course');

        Route::get('members/search', 'UserController@searchUser')->name('search');

        Route::group(['prefix' => 'groups'], function () {
            Route::get('/', 'Admin\GroupUserController@showAllGroupUser')->name('group-user');
        });

    });


});


Route::post('register', 'RegisterController@regis');

Route::get('user/activation/{token}', 'RegisterController@activateUser')->name('user.activate');




