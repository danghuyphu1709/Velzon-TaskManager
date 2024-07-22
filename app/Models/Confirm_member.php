<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm_member extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = ['token','table_code','email_member','created_at','updated_at'];

}
