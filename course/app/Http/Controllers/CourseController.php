<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function showAllCourses($id):JsonResponse
    {

        $result = DB::table('Course')->get();
         return new JsonResponse($result, 200);

    }
    public function getAllCourses($id):JsonResponse{
        $results = [];
        if (empty($results)){
            return new JsonResponse(
                'No orders found for this user',
                404
            );
        }
        return new JsonResponse($results, 200);

    }
}
