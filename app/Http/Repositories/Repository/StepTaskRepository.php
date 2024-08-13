<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\ListTask;
use App\Models\StepTask;
use App\Models\TableUser;

class StepTaskRepository extends BaseRepository
{
    public function getModel()
    {
        return StepTask::class;
    }

}
