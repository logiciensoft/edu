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
         $this->call(CoursesSeeder::class);
         $this->call(SubjectsSeeder::class);
         $this->call(CourseSubjectSeeder::class);
         $this->call(TutorialsSeeder::class);
         $this->call(QuizzesSeeder::class);
    }
}
