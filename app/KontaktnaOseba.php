<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontaktnaOseba extends Model
{
    protected $table = 'kontaktna_oseba';
    protected $primaryKey = 'id_kontakt';
    public $incrementing = true;
	
    // Model will not be timestamped
    public $timestamps = false;
		protected $fillable = ['postna_stevilka','ime','priimek','sifra_razmerje','ulica', 'kraj','tel_stevilka','id_uporabnik'];

    public function pacient() {
    	return $this->belongsTo('App\Pacient');
    }

    public function razmerje() {
    	return $this->belongsTo('App\SorodstvenoRazmerje');
    }
}
