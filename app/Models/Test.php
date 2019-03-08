<?php

namespace App\Models;

use App\Models\User;
use App\Models\Test;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'test_name',
        'lesson_id',	
        'time',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
