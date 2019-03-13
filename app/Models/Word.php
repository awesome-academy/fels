<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
    	'word_name',
    	'picture',
    	'sound',
    	'translate',
        'user_id',
        'lesson_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
