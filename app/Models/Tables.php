<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
}
