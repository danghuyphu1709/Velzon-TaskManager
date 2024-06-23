<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevelSpace extends Model
{
    use HasFactory;

    protected $table = 'access_level_spaces';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = ['access_name'];
}
