<?php

use Illuminate\Database\Seeder;

class GroupMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [[
            'id_group' => '1',
            'uid' => 'linhluv3',
            'add_uid' => 'linhluv1',
            'join_date' => new DateTime('2018-10-20'),

        ], [
            'id_group' => '1',
            'uid' => 'linhluv4',
            'add_uid' => 'linhluv2',
            'join_date' => new DateTime('2018-10-21'),
        ]];

        DB::table('GroupMember')->insert($data);
    }
}
