<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obisk extends Model
{
    protected $table = 'obisk';
    protected $primaryKey = 'sifra_obisk';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function delovni_nalog() {
    	return $this->belongsTo('App\DelovniNalog');
    }
}
