<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\UserHasRoleTable;

class UserHasRoleTableRepository extends BaseRepository
{
    public function getModel()
    {
        return UserHasRoleTable::class;
    }

}
