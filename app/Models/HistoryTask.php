<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryTask extends Model
{
    use HasFactory;

    protected $table = 'history_tasks';

    public $timestamps = true;

    public $fillable = [
        'type',
        'task_id',
        'data',
        'created_at',
        'updated_at'
    ];

    public function task() :BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
