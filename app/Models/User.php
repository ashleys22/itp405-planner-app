<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
