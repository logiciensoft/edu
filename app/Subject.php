<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    public function courses() {
        return $this->belongsToMany(Course::class);
    }

    public function quizzes() {
        return $this->belongsToMany(Quiz::class);
    }

    public function tutorials() {
        return $this->belongsToMany(Tutorial::class);
    }
}
