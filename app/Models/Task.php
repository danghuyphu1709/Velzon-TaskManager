<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Task extends Model
{
    use HasFactory;

    protected  $table = 'tasks';

    public $timestamps = true;

    public $fillable = ['list_task_id','code','task_name','task_image','task_description','due_date','status','start_date','created_at','updated_at'];

    public function ListTask() :BelongsTo
    {
        return $this->belongsTo(ListTask::class);
    }

    public function user() :BelongsToMany
    {
        return $this->belongsToMany(User::class,'task_users', 'task_id', 'user_id');
    }

    public function StepTask() :HasMany
    {
        return $this->hasMany(StepTask::class);
    }

    public function CommentTask() : HasMany
    {
        return $this->hasMany(CommentTask::class);
    }

    public function historyTask() : HasMany
    {
        return $this->hasMany(HistoryTask::class);
    }

    public function table() :HasOneThrough
    {
        return $this->hasOneThrough(
            Tables::class,
            ListTask::class,
            'tables_id',
            'id',
            'list_task_id',
            'id',

        );
    }
}
