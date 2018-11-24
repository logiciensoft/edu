<?php
namespace App\Repositories;

use App\Question;
use App\Quiz;
use Illuminate\Support\Facades\DB;

class QuizRepository
{
    public function all()
    {
        return Quiz::with(['subjects', 'questions'])
            ->orderBy('id')
            ->get();
    }

    public function create($name, $questions)
    {
        DB::beginTransaction();

        $quiz = Quiz::create(['name'=>$name]);

        if(!empty($questions))
            foreach ($questions as $question)
                $quiz->questions()->create([
                    'quiz_id' => $quiz->id,
                    'question' => $question['question'],
                    'responses' => json_encode($question['responses'])
                ]);

        DB::commit();

        return $quiz;
    }

    public function update($id, $name, $questions)
    {
        $quiz = Quiz::findOrFail($id);

        DB::beginTransaction();

        $quiz->update(['name'=>$name]);

        $quiz->questions()->delete();
        if(!empty($questions))
            foreach ($questions as $question)
                $quiz->questions()->create([
                    'quiz_id' => $quiz->id,
                    'question' => $question['question'],
                    'responses' => json_encode($question['responses'])
                ]);

        DB::commit();

        return $quiz;
    }

    public function get($id)
    {
        return Quiz::with(['subjects', 'questions'])
            ->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->get($id)->delete();
    }
}