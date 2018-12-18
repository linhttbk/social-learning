<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dataChap1 = $this->createDumpData(1);
        $dataChap2 = $this->createDumpData(2);
        $dataChap3 = $this->createDumpData(3);
        $dataChap4 = $this->createDumpData(4);
        $dataChap5 = $this->createDumpData(5);
        $dataChap6 = $this->createDumpData(6);
        $dataChap7 = $this->createDumpData(7);
        $dataChap8 = $this->createDumpData(8);
        $dataChap9 = $this->createDumpData(9);
        $dataChap10 = $this->createDumpData(10);
        $dataChap11 = $this->createDumpData(11);
        $dataChap12 = $this->createDumpData(12);
        $dataChap13 = $this->createDumpData(13);
        $dataChap14 = $this->createDumpData(14);
        $dataChap15 = $this->createDumpData(15);
        $dataChap16 = $this->createDumpData(16);
        $dataChap17 = $this->createDumpData(17);
        $dataChap18 = $this->createDumpData(18);

        DB::table('Question')->insert($dataChap1);
        DB::table('Question')->insert($dataChap2);
        DB::table('Question')->insert($dataChap3);
        DB::table('Question')->insert($dataChap4);
        DB::table('Question')->insert($dataChap5);
        DB::table('Question')->insert($dataChap6);
        DB::table('Question')->insert($dataChap7);
        DB::table('Question')->insert($dataChap8);
        DB::table('Question')->insert($dataChap9);
        DB::table('Question')->insert($dataChap10);
        DB::table('Question')->insert($dataChap11);
        DB::table('Question')->insert($dataChap12);
        DB::table('Question')->insert($dataChap13);
        DB::table('Question')->insert($dataChap14);
        DB::table('Question')->insert($dataChap15);
        DB::table('Question')->insert($dataChap16);
        DB::table('Question')->insert($dataChap17);
        DB::table('Question')->insert($dataChap18);
    }

    public function createDumpData($Id_chap)
    {
        return [
            [
                'id_chap' => $Id_chap,
                'content' => 'I feel terrible. I think I _________ sick.',
                'true_answer' => 'D',
                'url_image' => null,

            ], [
                'id_chap' => $Id_chap,
                'content' => '_________ does he want to study English? - Because it is an international language.',
                'true_answer' => 'D',
                'url_image' => null,

            ], [
                'id_chap' => $Id_chap,
                'content' => 'Would you like _________ somewhere for a drink?',
                'true_answer' => 'D',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'He is tired now _________ he stayed up late last night.',
                'true_answer' => 'A',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'She _________ like cakes when she was young.',
                'true_answer' => 'D',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'This resort _________ since 2008.',
                'true_answer' => 'D',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'These adults, _________ come to my night class, are very eager to learn.',
                'true_answer' => 'C',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'I am interested _________ playing badminton.',
                'true_answer' => 'B',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => '_________ do you study? - I study at Diep Minh Chau High School.',
                'true_answer' => 'C',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'Tom isn’t on the phone, _________ makes it difficult to contact him.',
                'true_answer' => 'C',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'The film _________ by the time we _________ to the cinema.',
                'true_answer' => 'A',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'Mary didn’t _________ in Vietnam.',
                'true_answer' => 'D',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'He decided not to become a professional _________.',
                'true_answer' => 'B',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'The _________ have the future in their hands.',
                'true_answer' => 'C',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => ' Tom and Jerry is a good_______ on TV. Children like it very much.',
                'true_answer' => 'A',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => '______ he quits smoking, he will die.',
                'true_answer' => 'B',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'He spent a whole day ______ the radio.',
                'true_answer' => 'A',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'More newspapers ______ in this city every day.',
                'true_answer' => 'B',
                'url_image' => null,

            ]
            , [
                'id_chap' => $Id_chap,
                'content' => 'Marie Curie was the first woman ________a Ph.D. from the Sorbonne.',
                'true_answer' => 'A',
                'url_image' => null,

            ], [
                'id_chap' => $Id_chap,
                'content' => 'Mary will tell her mother the truth when she ________back.',
                'true_answer' => 'B',
                'url_image' => null,

            ]

        ];
    }
}
