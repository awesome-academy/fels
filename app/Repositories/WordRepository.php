<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Word;

class WordRepository extends BaseRepository
{
    public function model()
    {
        return Word::class;
    }

    public function wordFilter($paginate)
    {
        $user = \Auth::user();

        return $user->words()->latest()->paginate($paginate);
    }

    public function wordFilterWhere($paginate, $status)
    {
        $user = \Auth::user();

        return $user->words()->whereStatus($status)->whereUserId($user->id)->latest()->paginate($paginate);
    }
}
