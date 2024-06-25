<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasRoleTable extends Model
{
    use HasFactory;

    protected $table = 'user_has_role_tables';

    public $timestamps = false;

    public $fillable = ['user_id','tables_id','role_table_id'];
}
