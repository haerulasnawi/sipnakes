<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isip extends Model
{
    public function nake()
    {
        return $this->belongsTo(Nake::class);
    }
    public function faske()
    {
        return $this->belongsTo(Faske::class);
    }
}
