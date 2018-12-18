<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Admin')->insert([
            'uid' => 'linhluv1',
            'name' => 'Than Linh',
            'email' => 'linhcuong1212.@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
