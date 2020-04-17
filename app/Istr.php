<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Istr extends Model
{
    public function nake()
    {
        return $this->belongsTo(Nake::class);
    }
}
