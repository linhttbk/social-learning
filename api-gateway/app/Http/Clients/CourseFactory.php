<?php
/**
 * Created by PhpStorm.
 * User: linhtt
 * Date: 11/20/18
 * Time: 1:11 PM
 */

namespace App\Http\Clients;

use Illuminate\Support\Collection;

class CourseFactory
{

    private $courseClient;

    public function __construct()
    {
        $this->courseClient = new CourseClient();
    }

    public function getAllCourseFromUid($uid): Collection
    {
        try {
            $data = [];
            $res = $this->courseClient->getAllCourse($uid);
            $data["course"] = $res;
        } catch (HttpException $exception) {
            throw new HttpException($exception->getStatusCode(), $exception->getMessage());
        }
        return new Collection($data);
    }
}
