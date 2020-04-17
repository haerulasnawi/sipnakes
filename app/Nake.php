<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nake extends Model
{
    protected $table = 'nakes';
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jnake()
    {
        return $this->belongsTo(Jnake::class);
    }
    public function istr()
    {
        return $this->hasOne(Istr::class);
    }
    public function isip()
    {
        return $this->hasMany(Isip::class);
    }
}
