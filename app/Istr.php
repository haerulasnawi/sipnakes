<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Istr extends Model
{
    protected $table  ='istrs';
    protected $guarded = ['id'];
    public function nake()
    {
        return $this->belongsTo(Nake::class);
    }
}
