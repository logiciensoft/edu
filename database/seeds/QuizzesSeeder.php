<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed quizzes table

        $mid_sem_quiz_id = DB::table('quizzes')->insertGetId([
            'name' => 'Mid-Sem. Quiz',
        ]);

        $end_sem_quiz_id = DB::table('quizzes')->insertGetId([
            'name' => 'End-Sem. Quiz',
        ]);


        //assign the english quizzes

        $english_subject_id = DB::table('subjects')
            ->where('name', 'English')
            ->first()->id;

        DB::table('quiz_subject')->insert([
            'quiz_id' => $mid_sem_quiz_id,
            'subject_id' => $english_subject_id
        ]);

        DB::table('quiz_subject')->insert([
            'quiz_id' => $end_sem_quiz_id,
            'subject_id' => $english_subject_id
        ]);


        // seed the mid-semester quiz questions

        DB::table('questions')->insert([
           'quiz_id' => $mid_sem_quiz_id,
            'question' => 'The higher you go, the cooler it becomes?',
            'responses' => json_encode(['True', 'False'])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => $mid_sem_quiz_id,
            'question' => 'Latitudes move which direction on a map?',
            'responses' => json_encode(['East to West', 'North to South'])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => $mid_sem_quiz_id,
            'question' => 'What is the largest continent in the world?',
            'responses' => json_encode(['America', 'Asia', 'Europe', 'Africa'])
        ]);


        // seed the end-semester quiz questions

        DB::table('questions')->insert([
            'quiz_id' => $end_sem_quiz_id,
            'question' => 'What is the fastest land animal?',
            'responses' => json_encode(['Jaguar', 'Leopard', 'Cheetah'])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => $end_sem_quiz_id,
            'question' => 'What is the largest planet in our galaxy?',
            'responses' => json_encode(['Earth', 'Satan', 'Jupiter'])
        ]);

        DB::table('questions')->insert([
            'quiz_id' => $end_sem_quiz_id,
            'question' => 'Latitudes move which direction on a map?',
            'responses' => json_encode(['East to West', 'North to South'])
        ]);
    }
}
