<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function channels()
    {
        return $this->hasMany(Channel::class);
    }

    public function group_user()
    {
        return $this->hasMany(GroupUser::class);
    }

    protected $fillable = [
        'name',
        'description',
    ];
}
