<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected  $table = 'tasks';

    public $timestamps = true;

    public $fillable = ['list_task_id','task_name','task_image','task_description','priority','status','created_at','updated_at'];

    public function ListTask() :BelongsToMany
    {
        return $this->belongsToMany(ListTask::class );
    }
}
