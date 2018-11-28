<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $english = [
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 6,
                "title" => "A DAY IN THE LIFE OF"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 6,
                "title" => "SCHOOL TALKS"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 6,
                "title" => "PEOPLE'S BACKGROUND"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 6,
                "title" => "SPECIAL EDUCATION"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 6,
                "title" => "TECHNOLOGY AND YOU"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 6,
                "title" => "AN EXCURSION"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 7,
                "title" => "FRIENDSHIP"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 7,
                "title" => "PERSONAL EXPERIENCES"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 7,
                "title" => "A PARTY"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 7,
                "title" => "VOLUNTEER WORK"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 7,
                "title" => "ILLITERACY"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 7,
                "title" => "COMPETITIONS"
            ]
            ,
            ["des" => "I. Reading II Listening",
                "id_subject" => 8,
                "title" => "HOME LIFE"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 8,
                "title" => "CULTURAL DIVERSITY"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 8,
                "title" => "WAYS OF SOCIALIZING"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 8,
                "title" => "SCHOOL EDUCATION SYSTEM"
            ],
            ["des" => "I. Reading II Listening",
                "id_subject" => 8,
                "title" => "HIGHER EDUCATION"
            ],
            [
                "des" => "I. Reading II Listening",
                "id_subject" => 8,
                "title" => "FUTURE JOBS"
            ]
        ];
        DB::table('Chapter')->insert($english);
    }
}
