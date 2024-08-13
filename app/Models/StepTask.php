<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StepTask extends Model
{
    use HasFactory;

    protected  $table = 'step_tasks';

    public $timestamps = true;

    public $fillable = ['task_id','content','status','created_at','updated_at'];


    public function task() :BelongsTo
    {
      return  $this->belongsTo(Task::class);
    }
}
