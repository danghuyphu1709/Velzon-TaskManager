<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Tables extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public $fillable = ['code','access_level_table_id','spaces_id','title','description','important','created_at','updated_at'];

    public function spaces()
    {
        return $this->belongsTo(Spaces::class);
    }

    public function users(): BelongsToMany
    {
        return $this->spaces->users();
    }
}
