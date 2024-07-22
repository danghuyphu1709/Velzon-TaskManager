<?php

namespace App\Http\Repositories\Repository;
use App\Http\Repositories\BaseRepository;
use App\Models\Tables;

class TableRepository extends BaseRepository
{
    public function getModel()
    {
        return Tables::class;
    }

}
