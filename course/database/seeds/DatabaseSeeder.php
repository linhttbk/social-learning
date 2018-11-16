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
         $this->call([SubjectSeeder::class,  
            ChapterSeeder::class, LessonSeeder::class,
            CourseSeeder::class, CourseDetailSeeder::class,CourseRegistrationSeeder::class,DocumentTableSeeder::class,TestTableSeeder::class,]);
    }
}
