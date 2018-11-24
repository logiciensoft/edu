<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = ['content'];

    public function subjects() {
        return $this->belongsToMany(Subject::class);
    }
}
