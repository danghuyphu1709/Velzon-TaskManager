<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spaces extends Model
{
    use HasFactory;

    protected $table = 'spaces';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public $fillable = ['code','access_level_space_id','space_name','space_description','created_at','updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'space_users', 'spaces_id', 'user_id')
            ->withPivot('role_space_id');
    }
    public function tables()
    {
        return $this->hasMany(Tables::class);
    }

    public function AccessLevelSpace()
    {
        return $this->belongsTo(AccessLevelSpace::class);
    }



}
