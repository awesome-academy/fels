<?php

namespace App\Models;

use App\Models\History;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\Word;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'full_name',
        'password',
        'email',
        'gender',
        'date_of_birth',
        'avatar',
        'provider_user_id',
        'provider',
        'avatar',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function historys()
    {
        return $this->hasMany(History::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'user_topic', 'user_id', 'topic_id')->withTimestamps();
    }

    public function isRoleAdmin()
    {
        return $this->role()->where('id', config('setting.role_ad'))->exists();
    }

    public function getAvatarAttribute($image)
    {
        return isset($image) ? $image : config('setting.avatar');
    }
}
