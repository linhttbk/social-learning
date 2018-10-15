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
              'uid' => 'linhluv'.$i,
              'name' =>'Than Tai Linh',
              'sex' => 'male',
              'phone' => '0964988900',
              'birthday' => new DateTime('1997-11-20'),
              'email' => 'linhcuong1212'.$i.'@gmail.com',
              'type' => 0
          ];
            $account[$i] = [

                'uid' => 'linhluv'.$i,
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
                'status' => 1,
                'active' => 0
            ];
        }

        DB::table('User')->insert($users);
        DB::table('Account')->insert($account);
    }
}
