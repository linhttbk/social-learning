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
        DB::table('GroupUser')->insert([
            'uid' => 'linhluv1',
            'title' => 'Cong nghe web tien tien',
            'thumb_url' => '',
            'mode' => 0,
            'group_create_at' => new DateTime('2018-10-20'),
            'des' => 'Nhom lop mon Cong nghe web tien tien 20181',

        ]);
    }
}
