<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ListTask extends Model
{
    use HasFactory;

    protected  $table = 'list_tasks';

    public $timestamps = true;

    public $fillable = ['tables_id','title','status','created_at','updated_at'];

    public function Tables() :BelongsToMany
    {
        return $this->belongsToMany(Tables::class );
    }

    public function Task() :HasMany
    {
        return $this->hasMany(Task::class);
    }
}
