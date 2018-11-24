<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['name'];

    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
