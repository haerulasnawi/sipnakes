<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jnake extends Model
{
    public function nake()
    {
        return $this->hasMany(Nake::class);
    }
    public function jnake()
    {
        return $this->hasMany(Requirement::class);
    }
}
