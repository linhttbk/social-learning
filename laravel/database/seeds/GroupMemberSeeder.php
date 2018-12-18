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
            'uid' => 'linhluv1',
            'add_uid' => 'linhluv1',
            'role' => 2, //2 is admin
            'join_date' => new DateTime('2018-10-20'),

        ], [
            'id_group' => '1',
            'uid' => 'linhluv3',
            'add_uid' => 'linhluv1',
            'role' => 0,
            'join_date' => new DateTime('2018-10-20'),

        ], [
            'id_group' => '1',
            'uid' => 'linhluv4',
            'add_uid' => 'linhluv1',
            'role' => 0,
            'join_date' => new DateTime('2018-10-21'),
        ], [
            'id_group' => '2',
            'uid' => 'linhluv5',
            'add_uid' => 'linhluv5',
            'role' => 2, //2 is admin
            'join_date' => new DateTime('2018-10-21'),
        ], [
            'id_group' => '3',
            'uid' => 'linhluv3',
            'add_uid' => 'linhluv3',
            'role' => 2, //2 is admin
            'join_date' => new DateTime('2018-10-21'),
        ], [
            'id_group' => '4',
            'uid' => 'linhluv4',
            'add_uid' => 'linhluv4',
            'role' => 2, //2 is admin
            'join_date' => new DateTime('2018-10-21'),
        ], [
            'id_group' => '5',
            'uid' => 'linhluv2',
            'add_uid' => 'linhluv2',
            'role' => 2, //2 is admin
            'join_date' => new DateTime('2018-10-21'),
        ]];

        DB::table('GroupMember')->insert($data);
    }
}
