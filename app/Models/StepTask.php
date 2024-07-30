<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepTask extends Model
{
    use HasFactory;

    protected  $table = 'step_tasks';

    public $timestamps = true;

    public $fillable = ['tables_id','title','status','created_at','updated_at'];


}
