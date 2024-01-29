<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'tasks')->withPivot('task');
    // }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    protected $fillable = [
        'name',
        'overview',
        'type',
    ];
}
