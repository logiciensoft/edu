<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'quiz_id', 'question', 'response'
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
