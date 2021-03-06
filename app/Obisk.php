<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obisk extends Model
{
    protected $table = 'obisk';
    protected $primaryKey = 'sifra_obisk';

    // Model will not be timestamped
    public $timestamps = false;

	protected $fillable = ['sifra_dn', 'sifra_plan', 'originalna_sifra_plan', 'sifra_ps', 'sifra_nadomestne_ps', 'datum_obiska', 'datum_opravljenosti_obiska', 'opravljen', 'nadomescanje'];

    public function delovni_nalog() {
    	return $this->belongsTo('App\DelovniNalog', 'sifra_dn', 'sifra_dn');
    }

    public function plan() {
    	return $this->belongsTo('App\Plan', 'sifra_plan', 'sifra_plan');
    }

    public function patronazna_sestra() {
    	return $this->belongsTo('App\PatronaznaSestra', 'sifra_ps', 'sifra_ps');
    }

    public function porocilo() {
        return $this->hasMany('App\Porocilo', 'sifra_obisk', 'sifra_obisk');
    }

    public function nadomesca() {
        return $this->hasOne('App\Nadomescanje', 'sifra_obisk', 'sifra_obisk');
    }
}
