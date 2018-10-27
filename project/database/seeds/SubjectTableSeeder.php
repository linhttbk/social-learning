<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$title = array( 'toán','lý','hóa','văn','anh' );
    	$title_toan= array( 'toán 10','toán 11','toán 12');
    	$title_van= array( 'văn 10','văn 11','văn 12');
        $subject = array();
        for ($i = 0; $i <= 4; $i++) {
          $subject[$i] = [
              'id' => $i+1,
              'id_parent' =>$i+1,
              'title' => $title[$i]
          ];
        }
        for ($i = 5; $i <= 7; $i++) {
          $subject[$i] = [
              'id' => $i+1,
              'id_parent' =>'1',
              'title' => $title_toan[$i-5]
          ];
        }
        for ($i = 8; $i <= 10; $i++) {
          $subject[$i] = [
              'id' => $i+1,
              'id_parent' =>'2',
              'title' => $title_van[$i-8]
          ];
        }
        DB::table('Subject')->insert($subject);
    }
}
