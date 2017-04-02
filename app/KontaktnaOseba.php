<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontaktnaOseba extends Model
{
    protected $table = 'kontaktna_oseba';
    protected $primaryKey = 'sifra_kontaktna_oseba';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function pacient() {
    	return $this->belongsTo('App\Pacient');
    }

    public function razmerje() {
    	return $this->belongsTo('App\SorodstvenoRazmerje');
    }
}
