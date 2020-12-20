<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $fillable = ['url', 'name', 'descrip', 'status'];

    public function job()
    {
        return $this->hasMany(Job::class);
    }
    public function worker()
    {
        return $this->hasMany(worker::class);
    }
}
