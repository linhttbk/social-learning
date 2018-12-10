<?php

namespace App\Http\Controllers;

use App\Http\Clients\UserFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function checkLogin(): JsonResponse
    {
        try {
            $data = (new UserFactory())->checkLogin();
        } catch (HttpException $exception) {
            return new JsonResponse(
                $exception->getMessage(),
                $exception->getStatusCode()
            );
        }
        return new JsonResponse($data, 200);
    }

    public function doLogin(Request $request): JsonResponse
    {
        try {
            $data = (new UserFactory())->doLogin($request);
        } catch (HttpException $exception) {
            return new JsonResponse(
                $exception->getMessage(),
                $exception->getStatusCode()
            );
        }
        return new JsonResponse($data, 200);
    }
}
