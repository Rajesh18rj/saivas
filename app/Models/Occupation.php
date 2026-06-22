<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $guarded = [];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
