<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $course_detail = [
            [
                'id_course' => 1,
                'id_chap' => 1,
            ],
            [
                'id_course' => 1,
                'id_chap' => 2,
            ],
            [
                'id_course' => 1,
                'id_chap' => 3,
            ],
            [
                'id_course' => 1,
                'id_chap' => 4,
            ],
            [
                'id_course' => 2,
                'id_chap' => 7,
            ],
            [
                'id_course' => 2,
                'id_chap' => 8,
            ],
            [
                'id_course' => 2,
                'id_chap' => 9,
            ],
            [
                'id_course' => 2,
                'id_chap' => 10,
            ],
            [
                'id_course' => 2,
                'id_chap' => 11,
            ],
            [
                'id_course' => 3,
                'id_chap' => 13,
            ],
            [
                'id_course' => 3,
                'id_chap' => 14,
            ],
            [
                'id_course' => 3,
                'id_chap' => 15,
            ],
            [
                'id_course' => 3,
                'id_chap' => 16,
            ],
            [
                'id_course' => 3,
                'id_chap' => 17,
            ],

        ];
        DB::table('CourseDetail')->insert($course_detail);
    }
}
