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
        $data = [
            [
                'uid' => 'DinhThanhHai',
//                'name' =>'BuiVanHuy',
//                'sex' => 'male',
//                'phone' => '1234567890',
//                'birthday' => '1997/07/05',
//                'type' => '1',
//                'email' => 'huybuivan@gmail.com',
                'password' => bcrypt('123456'),
                'status' => '1'
            ],

        ];
        DB::table('account')->insert($data);
    }
}