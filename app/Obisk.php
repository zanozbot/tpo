<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obisk extends Model
{
    protected $table = 'obisk';
    protected $primaryKey = 'sifra_obisk';

    // Model will not be timestamped
    public $timestamps = false;

	protected $fillable = ['sifra_dn', 'datum_obiska'];

    public function delovni_nalog() {
    	return $this->belongsTo('App\DelovniNalog', 'sifra_dn', 'sifra_dn');
    }
}
