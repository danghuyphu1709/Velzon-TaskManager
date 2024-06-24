<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\Spaces;
class SpaceRepository extends BaseRepository
{
    public function getModel()
    {
        return Spaces::class;
    }
}
