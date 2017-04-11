<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivacijaRacuna extends Model
{
    protected $table = 'uporabnik_aktivacija';
    protected $primaryKey = 'token';

    // Primary key will not be auto incremented
    public $incrementing = false;

    protected $fillable = [
        'id_uporabnik', 'token'
    ];

    public function uporabnik() {
    	return $this->belongsTo('App\Uporabnik', 'id_uporabnik', 'id_uporabnik');
    }
}
