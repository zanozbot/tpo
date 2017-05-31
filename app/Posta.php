<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posta extends Model
{
    protected $table = 'posta';
    protected $primaryKey = 'postna_stevilka';

    protected $fillable = ['postna_stevilka', 'kraj', 'izbrisan'];

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function izvajalecZD() {
    	return $this->hasMany('App\IzvajalecZD', 'postna_stevilka', 'postna_stevilka');
    }

    public function pacient() {
    	return $this->hasMany('App\Pacient');
    }
}
