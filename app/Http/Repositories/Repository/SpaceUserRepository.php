<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\Spaces;
use App\Models\SpaceUser;

class SpaceUserRepository extends BaseRepository
{
    public function getModel()
    {
        return SpaceUser::class;
    }

}
