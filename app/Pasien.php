<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable= ['nama','poliklinik_id','alamat','telpon','usia'];
    public function poliklinik()
    {
        return $this->belongsTo('App\Poliklinik');
    }
}
