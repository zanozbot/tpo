<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nadomescanje extends Model
{
    protected $table = 'nadomescanje';
    protected $primaryKey = 'nid';

    // Primary key will not be auto incremented
    public $incrementing = true;
    // Model will not be timestamped
    public $timestamps = false;

    public function patronazna_sestra() {
    	return $this->belongsTo('App\PatronaznaSestra', 'sifra_ps', 'sifra_ps');
    }

    public function nadomestna_patronazna_sestra() {
    	return $this->belongsTo('App\PatronaznaSestra', 'sifra_ps', 'nadomestna_sifra_ps');
    }

    public function obisk() {
    	return $this->belongsTo('App\Obisk', 'sifra_obisk', 'sifra_obisk');
    }
}
