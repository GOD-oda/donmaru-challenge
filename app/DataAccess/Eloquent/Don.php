<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    protected $fillable = [
        'title',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];
}
