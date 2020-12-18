<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class worker extends Model
{
    protected $table = 'post-workers';
    protected $fillable = [
        'user_id',
        'category_id',
        'url',
        'work_experience',
        'field_work',
        'status',
        'img_thumb',
    ];

    public function user()
    {
        return $this->BelongsTo(Users::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->BelongsTo(Category::class, 'category_id', 'id');
    }
}
