<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	

	public function __construct()
    {
        $this->users = new Collection([
            "1" => "User 1",
            "2" => "User 2",
            "3" => "User 3",
        ]);
    }
     public function index(): JsonResponse
    {
        return new JsonResponse($this->users->toArray(), 200);
    }
}
