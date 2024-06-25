<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public $fillable = ['code','access_level_table_id','spaces_id','title','description','important','created_at','updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_role_tables', 'tables_id', 'user_id');
    }
    public function space()
    {
        return $this->belongsTo(Spaces::class);
    }

}
