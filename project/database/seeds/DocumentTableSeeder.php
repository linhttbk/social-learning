<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document = array();
        for ($i = 0; $i < 15; $i++) {
          $document[$i] = [
              'id' => $i,
              'id_subject' => 6,
              'url' => '123',
              'uid' => 'dinh thanh hai',
              'status' => '0',
              'des' => 'mon toan 10'
          ];
        }
        for ($i = 15; $i < 25; $i++) {
          $document[$i] = [
              'id' => $i,
              'id_subject' => 9,
              'url' => '123',
              'uid' => 'dinh thanh hai',
              'status' => '0',
              'des' => 'mon van 9'
          ];
        }
        DB::table('document')->insert($document);
    }
}
