<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
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
            'from' => 'Admin',
            'content' => 'Bạn có 1 bài học phải mở ngay hôm nay, đừng quên nhé!',
            'send_at' => Carbon::now(),
            'url_redirect' => '/',
            'uid_to' => 'linhluv1',
            'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
        ], [
            'from' => 'Admin',
            'content' => 'Bạn đã chậm tiến độ Chương 2 của Khóa học Tiếng Anh cơ bản. Hãy học ngay!',
            'send_at' => Carbon::now(),
            'url_redirect' => '/',
            'uid_to' => 'linhluv1',
            'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
        ],
            [
                'from' => 'Admin',
                'content' => 'Bạn có 1 bài học phải mở ngay hôm nay, đừng quên nhé!',
                'send_at' => Carbon::now(),
                'url_redirect' => '/',
                'uid_to' => 'linhluv1',
                'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
            ], [
                'from' => 'Admin',
                'content' => 'Bạn có 1 bài học phải mở ngay hôm nay, đừng quên nhé!',
                'send_at' => Carbon::now(),
                'url_redirect' => '/',
                'uid_to' => 'linhluv2',
                'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
            ], [
                'from' => 'Admin',
                'content' => 'Bạn có 1 bài học phải mở ngay hôm nay, đừng quên nhé!',
                'send_at' => Carbon::now(),
                'url_redirect' => '/',
                'uid_to' => 'linhluv2',
                'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
            ], [
                'from' => 'Admin',
                'content' => 'Bạn đã chậm tiến độ Chương 2 của Khóa học Tiếng Anh cơ bản. Hãy học ngay!',
                'send_at' => Carbon::now(),
                'url_redirect' => '/',
                'uid_to' => 'linhluv2',
                'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
            ],
            [
                'from' => 'Admin',
                'content' => 'Bạn có 1 bài học phải mở ngay hôm nay, đừng quên nhé!',
                'send_at' => Carbon::now(),
                'url_redirect' => '/',
                'uid_to' => 'linhluv2',
                'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
            ], [
                'from' => 'Admin',
                'content' => 'Bạn có 1 bài học phải mở ngay hôm nay, đừng quên nhé!',
                'send_at' => Carbon::now(),
                'url_redirect' => '/',
                'uid_to' => 'linhluv1',
                'avatar_from' => 'https://s3-ap-southeast-1.amazonaws.com/slearningteam/images/1544512849.png'
            ]];
        DB::table('notification')->insert($data);
    }
}
