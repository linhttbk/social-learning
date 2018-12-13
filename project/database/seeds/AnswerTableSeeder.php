<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data0 = $this->dumpData(0);
        $data1 = $this->dumpData(20);
        $data2 = $this->dumpData(40);
        $data3 = $this->dumpData(60);
        $data4 = $this->dumpData(80);
        $data5 = $this->dumpData(100);
        $data6 = $this->dumpData(120);
        $data7 = $this->dumpData(140);
        $data8 = $this->dumpData(160);
        $data9 = $this->dumpData(180);
        $data10 = $this->dumpData(200);
        $data11 = $this->dumpData(220);
        $data12 = $this->dumpData(240);
        $data13 = $this->dumpData(260);
        $data14 = $this->dumpData(280);
        $data15 = $this->dumpData(300);
        $data16 = $this->dumpData(320);
        $data17 = $this->dumpData(340);

        DB::table('Answer')->insert($data0);
        DB::table('Answer')->insert($data1);
        DB::table('Answer')->insert($data2);
        DB::table('Answer')->insert($data3);
        DB::table('Answer')->insert($data4);
        DB::table('Answer')->insert($data5);
        DB::table('Answer')->insert($data6);
        DB::table('Answer')->insert($data7);
        DB::table('Answer')->insert($data8);
        DB::table('Answer')->insert($data9);
        DB::table('Answer')->insert($data10);
        DB::table('Answer')->insert($data11);
        DB::table('Answer')->insert($data12);
        DB::table('Answer')->insert($data13);
        DB::table('Answer')->insert($data14);
        DB::table('Answer')->insert($data15);
        DB::table('Answer')->insert($data16);
        DB::table('Answer')->insert($data17);
    }

    function dumpData($idQuetion)
    {
        return [
            [
                'id_question' => $idQuetion + 1,
                'A' => 'will be',
                'B' => 'am',
                'C' => 'was going to be ',
                'D' => 'am going to',
                'guilde' => 'guilde',


            ], [
                'id_question' => $idQuetion + 2,
                'A' => 'Who',
                'B' => 'How',
                'C' => 'What',
                'D' => 'to go',
                'guilde' => 'guilde',


            ], [
                'id_question' => $idQuetion + 3,
                'A' => 'go',
                'B' => 'to going',
                'C' => 'going',
                'D' => 'to go',
                'guilde' => 'guilde',


            ],
            [
                'id_question' => $idQuetion + 4,
                'A' => 'because',
                'B' => 'but',
                'C' => 'so',
                'D' => 'and',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 5,
                'A' => 'would',
                'B' => 'must',
                'C' => 'could',
                'D' => 'used to',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 6,
                'A' => 'is building',
                'B' => 'was built',
                'C' => 'built',
                'D' => 'has been built',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 7,
                'A' => 'whose',
                'B' => 'whom',
                'C' => 'who',
                'D' => 'which',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 8,
                'A' => 'with',
                'B' => 'in',
                'C' => 'at',
                'D' => 'on',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 9,
                'A' => 'When',
                'B' => 'Who',
                'C' => 'Where',
                'D' => 'How',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 10,
                'A' => 'that',
                'B' => 'what',
                'C' => 'which',
                'D' => 'who',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 11,
                'A' => 'had already started/ got ',
                'B' => 'already started/ had gotten',
                'C' => 'had already started/ had gotten',
                'D' => 'has already started/ got',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 12,
                'A' => 'used to live ',
                'B' => 'lived',
                'C' => 'used to living ',
                'D' => 'use to live',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 13,
                'A' => 'photograph',
                'B' => 'photographer',
                'C' => 'photography',
                'D' => 'photographic',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 14,
                'A' => 'unemployed',
                'B' => 'sick',
                'C' => 'young',
                'D' => 'poor',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 15,
                'A' => 'cartoon',
                'B' => 'comedy',
                'C' => 'drama',
                'D' => 'quiz show',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 16,
                'A' => 'If',
                'B' => 'Unless',
                'C' => 'Although',
                'D' => 'Because',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 17,
                'A' => 'repairing',
                'B' => 'to repair',
                'C' => 'repaired',
                'D' => 'repair',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 18,
                'A' => 'are selling',
                'B' => 'are being sold',
                'C' => 'sell',
                'D' => 'sold',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 19,
                'A' => 'to receive',
                'B' => 'was received',
                'C' => 'receive',
                'D' => 'received',
                'guilde' => 'ss',


            ],
            [
                'id_question' => $idQuetion + 20,
                'A' => 'would come',
                'B' => 'comes',
                'C' => 'will come',
                'D' => 'will have come',
                'guilde' => 'ss',


            ],

        ];
    }
}
