<?php
/**
 * Created by PhpStorm.
 * User: linhtt
 * Date: 11/22/18
 * Time: 10:31 AM
 */

namespace App\Http\Clients;


use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Lcobucci\JWT\Parser;

class UserClient
{
    private $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://user:80']);
    }

    public function checkLogin()
    {
        try {
            $res = $this->client->get('api/checkLogin');
        } catch (BadResponseException $exception) {
            throw new HttpException(
                $exception->getCode(),
                json_decode($exception->getResponse()->getBody()->getContents())
            );
        }
        return json_decode($res->getBody()->getContents());
    }

    public function doLogin(Request $request)
    {
        $response = $this->client->post('api/doLogin', ['form_params' => [
            'uid' => $request->get('uid'),
            'password' => $request->get('password'),
            'client_id' => 4,
            'client_secret' => 'bvhOtkBIxv1haAcGjOBDq0mj7hmClG5zb2Pj750t',
            'grant_type' => 'password',
            'scope' => '*',
        ]
        ]);

        return json_decode($response->getBody()->getContents());
    }

    public function logout(Request $request)
    {
        $value = $request->bearerToken();
        $id = (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();
        $response = 'You have been successfully logged out!';
        return response($response, 200);
    }
}
