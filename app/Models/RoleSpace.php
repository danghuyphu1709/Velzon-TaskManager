<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RoleSpace extends Model
{
    use HasFactory;

    protected $table = 'role_spaces';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public $fillable = ['role_name'];


    public function spaces()
    {
        return $this->hasMany(Spaces::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
