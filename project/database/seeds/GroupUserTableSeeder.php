<?php

use Illuminate\Database\Seeder;

class GroupUserTableSeeder extends Seeder
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
            'uid' => 'linhluv1',
            'title' => 'Cong nghe web tien tien',
            'mode' => 0,
            'group_create_at' => new DateTime('2018-10-20'),
            'des' => 'Nhom lop mon Cong nghe web tien tien 20181',

        ], [
            'uid' => 'linhluv5',
            'title' => 'Nhom hoc tap lop 10A1 Co Giang',
            'mode' => 1,
            'group_create_at' => new DateTime(),
            'des' => 'Nhom trao doi hoc tap cho lop 10A1 Thpt Nguyen Trai',

        ], [
            'uid' => 'linhluv3',
            'title' => 'Nhom hoc tap lop 11A1 Co Thuy',
            'mode' => 0,
            'group_create_at' => new DateTime(),
            'des' => 'Nhom trao doi hoc tap cho lop 12A1 Thpt Le Loi',

        ], [
            'uid' => 'linhluv4',
            'title' => 'Nhom hoc tap lop 12A1 Co Duyen',
            'mode' => 0,
            'group_create_at' => new DateTime(),
            'des' => 'Nhom trao doi hoc tap cho lop 12A1 Thpt Nguyen Trai',

        ], [
            'uid' => 'linhluv2',
            'title' => 'Nhom hoc tap lop 10A1 Co Quynh',
            'mode' => 1,
            'group_create_at' => new DateTime(),
            'des' => 'Nhom trao doi hoc tap cho lop 10A1 Thpt Quang Trung',

        ]];
        DB::table('GroupUser')->insert($data);
    }
}
