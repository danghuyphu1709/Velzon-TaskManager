<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\Task;

class TaskRepository extends BaseRepository
{
    public function getModel()
    {
        return Task::class;
    }

}
