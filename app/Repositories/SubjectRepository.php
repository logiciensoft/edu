<?php
namespace App\Repositories;

use App\Subject;
use Illuminate\Support\Facades\DB;

class SubjectRepository
{
    public function all()
    {
        return Subject::with(['quizzes', 'tutorials', 'courses'])
            ->orderBy('name')
            ->get();
    }

    public function create($name, $quiz_ids, $tutorial_ids)
    {
        DB::beginTransaction();

        $subject = Subject::create(['name'=>$name]);

        if(!empty($quiz_ids))
            $subject->quizzes()->attach($quiz_ids);

        if(!empty($tutorial_ids))
            $subject->tutorials()->attach($tutorial_ids);

        DB::commit();

        return $subject;
    }

    public function update($id, $name, $quiz_ids, $tutorial_ids)
    {
        $subject = Subject::findOrFail($id);

        DB::beginTransaction();

        $subject->update(['name'=>$name]);
        $subject->quizzes()->sync($quiz_ids);
        $subject->tutorials()->sync($tutorial_ids);

        DB::commit();

        return $subject;
    }

    public function get($id)
    {
        return Subject::with(['quizzes', 'tutorials', 'courses'])
            ->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->get($id)->delete();
    }
}