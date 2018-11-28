<?php

namespace App\Http\Controllers;


use App\Http\Clients\CourseFactory;
use Illuminate\Http\JsonResponse;

use Symfony\Component\HttpKernel\Exception\HttpException;

class CourseController extends Controller
{
    //
    public function showCourseById($id): JsonResponse
    {
        try {
            $data = (new CourseFactory())->getAllCourseFromUid($id);
            return dd($data);

        } catch (HttpException $exception) {
            return new JsonResponse(
                $exception->getMessage(),
                $exception->getStatusCode()
            );
        }
        return new JsonResponse($data, 200);
    }
}
