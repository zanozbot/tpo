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

    public function izvajalecZD() {
    	return $this->belongsTo('App\IzvajalecZD', 'sifra_zd', 'sifra_zd');
    }

    public function vloga() {
    	return $this->belongsTo('App\Vloga', 'sifra_vloga', 'sifra_vloga');
    }
}
