<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
       public function showAllCourses()
    {
        $result = DB::table('Course')->get();
        return dd($result);

    }
}
