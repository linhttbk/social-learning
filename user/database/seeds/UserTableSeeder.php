<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = array();
        $account = array();
        for ($i = 0; $i < 25; $i++) {
            $users[$i] = [
                'uid' => 'linhluv' . $i,
                'name' => 'Than Tai Linh',
                'sex' => 'male',
                'phone' => '0964988900',
                'birthday' => new DateTime('1997-11-20'),
                'email' => 'linhcuong1212' . $i . '@gmail.com',
                'type' => 0
            ];
            $account[$i] = [

                'uid' => 'linhluv' . $i,
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
                'status' => 1,
                'active' => 0
            ];
        }
        $teachers = [[
            'uid' => 'teacher1',
            'name' => 'Nguyen Nhat Hai',
            'sex' => 'male',
            'phone' => '0961913223',
            'birthday' => new DateTime('1980-12-20'),
            'email' => 'hnnteacher@gmail.com',
            'id_sr' => 6,
            'type' => 1
        ], [
            'uid' => 'teacher2',
            'name' => 'Nguyen Nhat Quang',
            'sex' => 'male',
            'phone' => '0968884477',
            'birthday' => new DateTime('1975-01-23'),
            'email' => 'qnnteacher@gmail.com',
            'id_sr' => 7,
            'type' => 1
        ], [
            'uid' => 'teacher3',
            'name' => 'Nguyen Thi Quynh',
            'sex' => 'female',
            'phone' => '0962913233',
            'birthday' => new DateTime('1981-10-20'),
            'email' => 'qntteacher@gmail.com',
            'id_sr' => 8,
            'type' => 1
        ], [
            'uid' => 'teacher4',
            'name' => 'Nguyen Hai Tung',
            'sex' => 'male',
            'phone' => '0968884577',
            'birthday' => new DateTime('1972-03-13'),
            'email' => 'tnhteacher@gmail.com',
            'id_sr' => 9,
            'type' => 1
        ]];
        $account_teachers = [
            [
                'uid' => 'teacher1',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
                'status' => 1,
                'active' => 1
            ], [
                'uid' => 'teacher2',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
                'status' => 1,
                'active' => 1
            ], [
                'uid' => 'teacher3',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
                'status' => 1,
                'active' => 1
            ], [
                'uid' => 'teacher4',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
                'status' => 1,
                'active' => 0
            ],
        ];

        DB::table('User')->insert($users);
        DB::table('User')->insert($teachers);
        DB::table('Account')->insert($account);
        DB::table('Account')->insert($account_teachers);
    }
}
