<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PozabljenoGeslo extends Model
{
    protected $table = 'pozabljeno_geslo';
    protected $primaryKey = 'token';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = true;

    protected $fillable = [
        'id_uporabnik', 'token', 'geslo', 'dirty'
    ];

    public function uporabnik() {
    	return $this->belongsTo('App\Uporabnik', 'id_uporabnik', 'id_uporabnik');
    }
    
}
