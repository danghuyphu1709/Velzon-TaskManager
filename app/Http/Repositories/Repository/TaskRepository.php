<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\ListTask;
use App\Models\TableUser;

class TaskRepository extends BaseRepository
{
    public function getModel()
    {
        return ListTask::class;
    }

}
