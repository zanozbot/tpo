<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';
    protected $primaryKey = 'sifra_material';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function delovni_nalog() {
    	return $this->belongsToMany('App\DelovniNalog', 'delovni_nalog_material');
    }
}
