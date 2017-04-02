<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolezen extends Model
{
    protected $table = 'bolezen';
    protected $primaryKey = 'sifra_bolezen';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function delovni_nalog() {
    	return $this->hasMany('App\DelovniNalog');
    }
}
