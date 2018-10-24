<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $courses = [
            [
                'title' => 'Tiếng Anh cơ bản 10',
                'start_date' => new DateTime('2018-10-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'uid' => 'teacher1',
                'id_subject' =>6,
            ], [
                'title' => 'Tiếng Anh cơ bản 11',
                'start_date' => new DateTime('2018-10-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'uid' => 'teacher2',
                'id_subject' =>7,
            ], [
                'title' => 'Tiếng Anh cơ bản 12',
                'start_date' => new DateTime('2018-10-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'uid' => 'teacher1',
                'id_subject' =>8,
            ], [
                'title' => 'Toán cơ bản 10',
                'start_date' => new DateTime('2018-10-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'uid' => 'teacher4',
                'id_subject' =>9,
            ]
        ];
        DB::table('Course')->insert($courses);
    }
}
