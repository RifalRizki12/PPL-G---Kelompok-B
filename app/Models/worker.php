<?php

namespace App\Models;

use App\models\Users;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
