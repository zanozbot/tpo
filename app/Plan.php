<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plan';
    protected $primaryKey = 'sifra_plan';

    // Model will not be timestamped
    public $timestamps = false;

    protected $fillable = ['datum_plan', 'sifra_ps_plan'];

    public function obisk() {
    	return $this->hasMany('App\Obisk', 'sifra_plan', 'sifra_plan');
    }
}
