<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\TableUser;

class TableUserRepository extends BaseRepository
{
    public function getModel()
    {
        return TableUser::class;
    }

}
