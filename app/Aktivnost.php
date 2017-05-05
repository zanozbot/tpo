<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivnost extends Model
{
    protected $table = 'aktivnost';
    protected $primaryKey = 'aid';

    // Primary key will not be auto incremented
    public $incrementing = true;
    // Model will not be timestamped
    public $timestamps = false;

    public function porocilo() {
    	return $this->belongsTo('App\Porocilo', 'aid', 'aid');
    }
}
