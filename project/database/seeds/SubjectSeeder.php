<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subject = [[
            'title' => 'Tiếng Anh',
            ]
            ,
            [
                'title' => 'Toán',
            ],
            [
                'title' => 'Vật Lý',
            ],
            [
                'title' => 'Hóa Học',
            ],
            [
                'title' => 'Ngữ Văn',
            ],

            ];
        $subject_child = [
            ['title' => 'Tiếng Anh 10',
                'id_parent' => 1,
            ], ['title' => 'Tiếng Anh 11',
                'id_parent' => 1,
            ], ['title' => 'Tiếng Anh 12',
                'id_parent' => 1,
            ],
            ['title' => 'Toán 10',
                'id_parent' => 2,
            ], ['title' => 'Toán 11',
                'id_parent' => 2,
            ], ['title' => 'Toán 12',
                'id_parent' => 2,
            ], ['title' => 'Vật Lý 10',
                'id_parent' => 3,
            ], ['title' => 'Vật Lý 11',
                'id_parent' => 3,
            ], ['title' => 'Vật Lý 12',
                'id_parent' => 3,
            ], ['title' => 'Hóa Học 10',
                'id_parent' => 4,
            ], ['title' => 'Hóa Học 11',
                'id_parent' => 4,
            ], ['title' => 'Hóa Học 12',
                'id_parent' => 4,
            ], ['title' => 'Ngữ Văn 10',
                'id_parent' => 5,
            ], ['title' => 'Ngữ Văn 11',
                'id_parent' => 5,
            ], ['title' => 'Ngữ Văn 12',
                'id_parent' => 5,
            ]
        ];
        DB::table('Subject')->insert($subject);
        DB::table('Subject')->insert($subject_child);
    }
}
