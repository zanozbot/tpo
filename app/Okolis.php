<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Okolis extends Model
{
    protected $table = 'okolis';
    protected $primaryKey = 'sifra_okolis';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function patronazna_sestra() {
    	return $this->belongsTo('App\PatronaznaSesta');
    }

    public function pacient() {
    	return $this->hasMany('App\Pacient');
    }
}
