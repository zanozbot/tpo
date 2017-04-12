<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DelovniNalog extends Model
{
    protected $table = 'delovni_nalog';
    protected $primaryKey = 'sifra_dn';

    protected $fillable = ['sifra_delavec', 'sifra_bolezen', 'sifra_vrsta_obisk', 'barva_epruvete', 'stevilo_epruvet',
    'datum_prvega_obiska', 'datum_koncnega_obiska', 'datum_obvezen', 'stevilo_obiskov', 'casovni_interval'];

    public function vrsta_obiska() {
    	return $this->belongsTo('App\VrstaObiska');
    }

    public function bolezen() {
    	return $this->belongsTo('App\Bolezen');
    }

    public function material() {
    	return $this->belongsToMany('App\Material', 'delovni_nalog_material');
    }

    public function obisk() {
    	return $this->hasMany('App\Obisk', 'sifra_dn', 'sifra_dn');
    }

    public function zdravilo() {
    	return $this->belongsToMany('App\Zdravilo', 'delovni_nalog_zdravilo');
    }

    public function pacient() {
    	return $this->belongsToMany('App\Pacient', 'delovni_nalog_pacient');
    }

}
