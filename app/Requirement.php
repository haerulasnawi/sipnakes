<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $guarded = ['id'];
    public function jnake()
    {
        return $this->belongsTo(Jnake::class);
    }
}
