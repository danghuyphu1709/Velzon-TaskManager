<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceUser extends Model
{
    use HasFactory;

    protected $table = 'space_users';

    public $timestamps = false;

    public $fillable = ['spaces_id','user_id','role_space_id'];
}
