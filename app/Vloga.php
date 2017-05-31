<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vloga extends Model
{
    protected $table = 'vloga';
    protected $primaryKey = 'sifra_vloga';

    protected $fillable = ['sifra_vloga', 'ime', 'izbrisan'];

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function uporabnik() {
    	return $this->hasMany('App\Uporabnik', 'sifra_vloga', 'sifra_vloga');
    }
}
