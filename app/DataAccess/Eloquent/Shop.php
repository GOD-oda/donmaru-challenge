<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
    ];

    public function dons()
    {
        return $this->belongsToMany(Don::class);
    }
}
