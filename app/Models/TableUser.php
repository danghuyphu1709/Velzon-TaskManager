<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TableUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['tables_id','user_id','role_tables_id','is_created'];

}
