<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentTask extends Model
{
    use HasFactory;

    protected $table = 'comment_tasks';

    public $timestamps = true;

    public $fillable = ['user_id','task_id','content','created_at','updated_at'];


    public function task() :BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
