<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'lname',
        'email',
        'email_verified_at',
        'password',
        'address',
        'phone',
        'picture',
        'resume',
        'no_rek',
        'role_as',
        'isverified',
    ];

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
