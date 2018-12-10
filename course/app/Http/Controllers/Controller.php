<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

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
    public function test(){
        try {
            DB::connection()->getPdo();
            return "Connected";
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        }
    }
}
