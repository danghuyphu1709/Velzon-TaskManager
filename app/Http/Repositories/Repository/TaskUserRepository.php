<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\TaskUser;

class TaskUserRepository extends BaseRepository
{
    public function getModel()
    {
        return TaskUser::class;
    }

}
