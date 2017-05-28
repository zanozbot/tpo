<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zdravilo extends Model
{
    protected $table = 'zdravilo';
    protected $primaryKey = 'sifra_zdravilo';

    protected $fillable = ['sifra_zdravilo', 'ime', 'izbrisan', 'opis', 'cena'];

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;

    public function delovni_nalog() {
    	return $this->belongsToMany('App\DelovniNalog', 'delovni_nalog_zdravilo');
    }
}
