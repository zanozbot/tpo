<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vloga extends Model
{
    protected $table = 'vloga';
    protected $primaryKey = 'sifra_vloga';

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function delavec() {
    	return $this->hasMany('App\Delavec', 'sifra_vloga', 'sifra_vloga');
    }
}
