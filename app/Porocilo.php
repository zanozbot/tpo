<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Porocilo extends Model
{
    protected $table = 'porocilo';
    protected $primaryKey = 'pid';

    // Primary key will be auto incremented
    public $incrementing = true;
    // Model will be timestamped
    public $timestamps = true;

    protected $fillable = ['sifra_obisk', 'aid', 'opis'];

    public function obisk() {
    	return $this->belongsTo('App\Obisk', 'sifra_obisk', 'sifra_obisk');
    }

    public function aktivnost() {
    	return $this->hasOne('App\Aktivnost', 'aid', 'aid');
    }
}
