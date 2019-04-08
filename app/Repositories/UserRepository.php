<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }

    public function changePassword($user, $password)
    {
        return $user->update(['password' => bcrypt($password)]);
    }
}
