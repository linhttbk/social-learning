<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tests = [[
            'id_chap' => 1,

        ], [
            'id_chap' => 2,

        ], [
            'id_chap' => 3,

        ], [
            'id_chap' => 4,

        ],
            [
                'id_chap' => 5,

            ],
            [
                'id_chap' => 6,

            ],
            [
                'id_chap' => 7,

            ],
            [
                'id_chap' => 8,

            ],
            [
                'id_chap' => 9,

            ], [
                'id_chap' => 10,

            ], [
                'id_chap' => 11,

            ],
            [
                'id_chap' => 12,

            ], [
                'id_chap' => 13,

            ], [
                'id_chap' => 14,

            ], [
                'id_chap' => 15,

            ], [
                'id_chap' => 16,

            ], [
                'id_chap' => 17,

            ],
        ];
        DB::table('Test')->insert($tests);
    }
}
