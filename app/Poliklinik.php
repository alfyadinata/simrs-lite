<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    protected $table = 'polikliniks';
    protected $guarded = [];
    // protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pasien()
    {
        return $this->hasMany('App\Pasien');
    }
}
