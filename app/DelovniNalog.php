<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DelovniNalog extends Model
{
    protected $table = 'delovni_nalog';
    protected $primaryKey = 'sifra_dn';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

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
