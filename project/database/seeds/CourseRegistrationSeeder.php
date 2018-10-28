<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'id_course' =>1,
                'uid'=>'linhluv1',
                'date_reg' => new DateTime('2018-10-20'),
            ], [
                'id_course' =>1,
                'uid'=>'linhluv2',
                'date_reg' => new DateTime('2018-10-15'),
            ], [
                'id_course' =>1,
                'uid'=>'linhluv3',
                'date_reg' => new DateTime('2018-10-12'),
            ], [
                'id_course' =>1,
                'uid'=>'linhluv4',
                'date_reg' => new DateTime('2018-10-11'),
            ], [
                'id_course' =>1,
                'uid'=>'linhluv5',
                'date_reg' => new DateTime('2018-10-10'),
            ], [
                'id_course' =>1,
                'uid'=>'linhluv6',
                'date_reg' => new DateTime('2018-10-07'),
            ], [
                'id_course' =>2,
                'uid'=>'linhluv9',
                'date_reg' => new DateTime('2018-10-15'),
            ],
            [
                'id_course' =>2,
                'uid'=>'linhluv10',
                'date_reg' => new DateTime('2018-10-20'),
            ],
            [
                'id_course' =>2,
                'uid'=>'linhluv11',
                'date_reg' => new DateTime('2018-10-21'),
            ],
            [
                'id_course' =>2,
                'uid'=>'linhluv12',
                'date_reg' => new DateTime('2018-10-21'),
            ],
            [
                'id_course' =>3,
                'uid'=>'linhluv15',
                'date_reg' => new DateTime('2018-10-22'),
            ],

        ];
        DB::table('CourseRegistration')->insert($data);

    }
}
