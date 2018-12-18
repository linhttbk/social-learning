<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([SubjectSeeder::class, UserTableSeeder::class, AdminTableSeeder::class, GroupUserTableSeeder::class,
            GroupMemberSeeder::class, ChapterSeeder::class, LessonSeeder::class,
            CourseSeeder::class, CourseDetailSeeder::class, CourseRegistrationSeeder::class, DocumentTableSeeder::class,
            TestTableSeeder::class, QuestionTableSeeder::class, AnswerTableSeeder::class,NotificationSeeder::class,]);
    }
}
