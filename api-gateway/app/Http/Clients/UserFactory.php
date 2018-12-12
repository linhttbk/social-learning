<?php
/**
 * Created by PhpStorm.
 * User: linhtt
 * Date: 11/22/18
 * Time: 10:35 AM
 */

namespace App\Http\Clients;



use Illuminate\Http\Request;

class UserFactory
{
    private $userClient;

    public function __construct()
    {
        $this->userClient = new UserClient();

    }

    public function checkLogin()
    {

        try {
            $res = $this->userClient->checkLogin();
        } catch (HttpException $exception) {
            throw new HttpException($exception->getStatusCode(), $exception->getMessage());
        }
        return $res;
    }

    public function doLogin(Request $request)
    {
        try {
            $res = $this->userClient->doLogin($request);
        } catch (HttpException $exception) {
            throw new HttpException($exception->getStatusCode(), $exception->getMessage());
        }

        return $res;
    }
}
