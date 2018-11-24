<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the course Ids

        $primary_course_id = DB::table('courses')
            ->where('name', 'Primary')
            ->first()->id;

        $secondary_course_id = DB::table('courses')
            ->where('name', 'Secondary')
            ->first()->id;


        // Get the subjects ids

        $english_subject_id = DB::table('subjects')
            ->where('name', 'English')
            ->first()->id;

        $maths_subject_id = DB::table('subjects')
            ->where('name', 'Mathematics')
            ->first()->id;

        $science_subject_id = DB::table('subjects')
            ->where('name', 'Science')
            ->first()->id;

        $social_study_subject_id = DB::table('subjects')
            ->where('name', 'Social Studies')
            ->first()->id;

        $swahili_subject_id = DB::table('subjects')
            ->where('name', 'Swahili')
            ->first()->id;


        // Setup Primary course subjects

        DB::table('course_subject')->insert([
            'course_id' => $primary_course_id,
            'subject_id' => $english_subject_id
        ]);

        DB::table('course_subject')->insert([
            'course_id' => $primary_course_id,
            'subject_id' => $maths_subject_id
        ]);

        DB::table('course_subject')->insert([
            'course_id' => $primary_course_id,
            'subject_id' => $science_subject_id
        ]);


        // Setup Secondary course subjects

        DB::table('course_subject')->insert([
            'course_id' => $secondary_course_id,
            'subject_id' => $english_subject_id
        ]);

        DB::table('course_subject')->insert([
            'course_id' => $secondary_course_id,
            'subject_id' => $maths_subject_id
        ]);

        DB::table('course_subject')->insert([
            'course_id' => $secondary_course_id,
            'subject_id' => $social_study_subject_id
        ]);

        DB::table('course_subject')->insert([
            'course_id' => $secondary_course_id,
            'subject_id' => $swahili_subject_id
        ]);
    }
}
