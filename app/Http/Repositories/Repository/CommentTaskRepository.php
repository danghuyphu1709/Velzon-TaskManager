<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\CommentTask;
use App\Models\ListTask;
use App\Models\TableUser;

class CommentTaskRepository extends BaseRepository
{
    public function getModel()
    {
        return CommentTask::class;
    }


}
