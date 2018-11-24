<?php
namespace App\Repositories;

use App\Course;

class CourseRepository
{
    public function all() {
        return Course::with('subjects')
            ->orderBy('name')
            ->get();
    }

    public function create($name, $subject_ids) {
        $course = Course::create(['name'=>$name]);
        if(!empty($subject_ids))
            $course->subjects()->attach($subject_ids);
        return $course;
    }

    public function update($id, $name, $subject_ids) {
        $course = Course::findOrFail($id);
        $course->update(['name'=>$name]);
        $course->subjects()->sync($subject_ids);
        return $course;
    }

    public function get($id) {
        return Course::with(['subjects'])->findOrFail($id);
    }

    public function delete($id) {
        return $this->get($id)->delete();
    }
}