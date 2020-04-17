<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faske extends Model
{
    public function isip()
    {
        return $this->hasMany(Isip::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
