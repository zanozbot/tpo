<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatronaznaSestra extends Model
{
    protected $table = 'patronazna_sestra';
    protected $primaryKey = 'sifra_ps';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    protected $fillable = ['sifra_ps', 'sifra_okolis', 'sifra_zd', 'id_uporabnik'];

    public function izvajalecZD() {
    	return $this->belongsTo('App\IzvajalecZD', 'sifra_zd', 'sifra_zd');
    }

    public function okolis() {
    	return $this->hasOne('App\Okolis');
    }

    public function uporabnik() {
        return $this->belongsTo('App\Uporabnik', 'id_uporabnik', 'id_uporabnik');
    }

    public function obisk() {
        return $this->hasMany('App\Obisk', 'sifra_ps', 'sifra_ps');
    }

    public function je_nadomescana() {
        return $this->hasMany('App\Nadomescanje', 'sifra_ps', 'sifra_ps');
    }

    public function nadomesca() {
        return $this->hasMany('App\Nadomescanje', 'sifra_ps', 'nadomestna_sifra_ps');
    }
}
