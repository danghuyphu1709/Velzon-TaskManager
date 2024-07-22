<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use mysql_xdevapi\Table;

class AccessLevelTables extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['access_name'];

    public function tables() :HasMany
    {
        return $this->hasMany(Tables::class);
    }
}
