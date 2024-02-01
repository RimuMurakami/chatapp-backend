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

    public function users()
    {
        return $this->group->users();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * このチャンネルに所属するユーザーを取得するアクセサ。
     */
    public function getUsersAttribute()
    {
        // group リレーションをロードしていない場合は、ここでロードする
        if (!$this->relationLoaded('group')) {
            $this->load('group.users');
        }

        // group リレーションを通じて users コレクションを返す
        return $this->group->users;
    }

    protected $fillable = [
        'group_id',
        'name',
        'overview',
        'type',
    ];
}
