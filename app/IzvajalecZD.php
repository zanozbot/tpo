<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IzvajalecZD extends Model
{
    protected $table = 'izvajalec_zd';
    protected $primaryKey = 'sifra_zd';

    protected $fillable = ['sifra_zd', 'postna_stevilka', 'izbrisan', 'naziv', 'naslov'];

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function posta() {
    	return $this->belongsTo('App\Posta', 'postna_stevilka', 'postna_stevilka');
    }

    public function patronazna_sestra() {
    	return $this->hasMany('App\PatronaznaSesta', 'sifra_zd', 'sifra_zd');
    }

    public function delavec() {
        return $this->hasMany('App\Delavec', 'sifra_zd', 'sifra_zd');
    }
}
