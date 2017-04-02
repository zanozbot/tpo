<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SorodstvenoRazmerje extends Model
{
    protected $table = 'sorodstveno_razmerje';
    protected $primaryKey = 'sifra_razmerje';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function pacient() {
    	return $this->hasMany('App\Pacient');
    }

    public function kontaktna_oseba() {
    	return $this->hasMany('App\KontaktnaOseba');
    }
}
