<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $table = 'pacient';
    protected $primaryKey = 'stevilka_KZZ';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function delovni_nalog() {
    	return $this->belongsToMany('App\DelovniNalog', 'delovni_nalog_pacient');
    }

    public function posta() {
    	return $this->belongsTo('App\Posta');
    }

    public function okolis() {
    	return $this->belongsTo('App\Okolis');
    }

    public function sorodstveno_razmerje() {
    	return $this->belongsTo('App\SorodstvenoRazmerje');
    }

    public function kontaktna_oseba() {
    	return $this->hasOne('App\KontaktnaOseba');
    }

    public function skrbi_za() {
        return $this->hasMany('App\Pacient', 'pac_stevilka_KZZ', 'stevilka_KZZ');
    }

    public function skrbnik() {
    	return $this->belongsTo('App\Pacient', 'stevilka_KZZ', 'pac_stevilka_KZZ');
    }

    public function uporabnik() {
        return $this->belongsTo('App\Uporabnik', 'id_uporabnik', 'id_uporabnik');
    }
}
