<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VrstaObiska extends Model
{
    protected $table = 'vrsta_obiska';
    protected $primaryKey = 'sifra_vrsta_obisk';

    protected $fillable = ['sifra_vrsta_obisk', 'ime', 'preventivni', 'izbrisan', 'cena'];

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function delovni_nalog() {
    	return $this->hasMany('App\DelovniNalog', 'sifra_vrsta_obisk', 'sifra_vrsta_obisk');
    }
}
