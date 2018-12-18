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
                'start_date' => new DateTime('2018-12-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'des' => "English 10 basic with Native Speaker",
                'uid' => 'teacher1',
                'id_subject' => 6,
            ], [
                'title' => 'Tiếng Anh cơ bản 11',
                'start_date' => new DateTime('2018-12-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'des' => "English 11 basic with Native Teacher",
                'uid' => 'teacher2',
                'id_subject' => 7,
            ], [
                'title' => 'Tiếng Anh cơ bản 12',
                'start_date' => new DateTime('2018-12-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'des' => "English 12 basic with Native Teacher from Ha Noi University of science and technology",
                'uid' => 'teacher1',
                'id_subject' => 8,
            ], [
                'title' => 'Toán cơ bản 10',
                'start_date' => new DateTime('2018-12-25'),
                'end_date' => new DateTime('2019-03-25'),
                'price' => 0,
                'des' => "Toan co ban lop 10 cho hoc sinh moi bat dau",
                'uid' => 'teacher4',
                'id_subject' => 9,
            ]
        ];
        DB::table('Course')->insert($courses);
    }
}
