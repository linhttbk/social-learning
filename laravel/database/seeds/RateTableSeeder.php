<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rate = [
            [
                'uid' => 'linhluv1',
                'vote' => random_int(1, 5),
                'id_course' => 1,
                'comment' => 'Khoa hoc rat hay va phu hop voi toi. Hay tham gia di cac ban'
            ], [
                'uid' => 'linhluv2',
                'vote' => random_int(1, 5),
                'id_course' => 1,
                'comment' => 'Khoa hoc rat hay va phu hop voi toi. Hay tham gia di cac ban!'
            ], [
                'uid' => 'linhluv3',
                'vote' => random_int(1, 5),
                'id_course' => 1,
                'comment' => 'Khoa hoc rat hay va phu hop voi toi. Hay tham gia di!'
            ],
        ];
        DB::table('Rate')->insert($rate);
    }
}
