<?php

namespace App\Models;

use App\models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $table = 'jobs';
    protected $fillable = [
        'category_id',
        'owner_id',
        'url',
        'job_name',
        'job_descrip',
        'job_capacity',
        'job_image',
        'job_req',
        'job_salary',
        'job_status',
    ];

    //foreignkey category id
    public function category()
    {
        return $this->BelongsTo(Category::class, 'category_id', 'id');
    }

    public function owner()
    {
        return $this->BelongsTo(Users::class, 'owner_id', 'id');
    }

}
