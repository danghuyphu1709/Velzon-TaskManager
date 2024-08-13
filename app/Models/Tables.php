<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Tables extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public $fillable = ['code','access_level_tables_id','title','description','important','created_at','updated_at'];

    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class,'table_users', 'tables_id', 'user_id')
            ->withPivot('roles_id', 'is_created');
    }

    public function AccessLevelTables() : BelongsTo
    {
        return $this->belongsTo(AccessLevelTables::class);
    }

    public function ListTask() :HasMany
    {
      return $this->hasMany(ListTask::class);
    }

    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(
            Task::class,          // Model Task
            ListTask::class,      // Model trung gian ListTask
            'tables_id',            // Khóa ngoại trên bảng ListTask trỏ đến bảng List
            'list_task_id',                 // Khóa ngoại trên bảng Task trỏ đến bảng ListTask
            'id',                 // Khóa chính trên bảng List
            'id'             // Khóa chính trên bảng Task
        );
    }
}
