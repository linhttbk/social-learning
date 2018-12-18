<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'id_subject' => 6,
                'url' => 'https://docs.google.com/spreadsheets/d/1SEou2Fkq5BbeTJM25BhhbMn7isH_WHidliD79CNbS6o/edit#gid=135497270',
                'uid' => 'linhluv1',
                'status' => '0',
                'des' => 'Tai lieu Tiếng Anh 10'
            ];
        }
        for ($i = 15; $i < 25; $i++) {
            $document[$i] = [
                'id_subject' => 9,
                'url' => 'https://github.com/LeonelLopez84/lumen_crud/blob/735874067c810655db97db1e7bfe6fc9e4d29f31/apidoc.json',
                'uid' => 'linhluv1',
                'status' => '0',
                'des' => 'Tai lieu Toán 10'
            ];
        }
        for ($i = 25; $i < 50; $i++) {
            $document[$i] = [
                'id_subject' => 15,
                'url' => 'https://github.com/LeonelLopez84/lumen_crud/blob/735874067c810655db97db1e7bfe6fc9e4d29f31/apidoc.json',
                'uid' => 'linhluv1',
                'status' => '0',
                'des' => 'Tai lieu Hoá 10'
            ];
        }
        DB::table('document')->insert($document);
    }
}
