<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spaces extends Model
{
    use HasFactory;

    protected $table = 'spaces';
    protected $primaryKey = 'id';

    public $timestamps = true;
    public $fillable = ['access_level_space_id','space_name','space_description','important','created_at','updated_at'];
}
