<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delavec extends Model
{
    protected $table = 'delavec';
    protected $primaryKey = 'sifra_delavec';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    protected $fillable = ['sifra_delavec', 'sifra_zd', 'id_uporabnik'];

    public function izvajalecZD() {
    	return $this->belongsTo('App\IzvajalecZD', 'sifra_zd', 'sifra_zd');
    }

    public function uporabnik() {
        return $this->belongsTo('App\Uporabnik', 'id_uporabnik', 'id_uporabnik');
    }
}
