<?php

namespace App\Http\Clients;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Symfony\Component\HttpKernel\Exception\HttpException;


class CourseClient
{
    private $client;

    public function __construct()
    {
       // $this->client = new Client();
       $this->client = new Client(['base_uri' => 'http://course:80']);
    }

    public function getAllCourse($id) {
        try{
            $res = $this->client->get(sprintf('user/%s/courses',$id));
        }catch (BadResponseException $exception) {
                         throw new HttpException(
                $exception->getCode(),
                json_decode($exception->getResponse()->getBody()->getContents())
            );
        }
        return json_decode($res->getBody()->getContents());

    }
}
