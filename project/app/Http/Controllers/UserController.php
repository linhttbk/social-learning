<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function connect(){
        if (DB::connection()->getDatabaseName()) {
            $user = User::all();
            var_dump(json_encode($user));
            return "Hello";

        }
    }
}
