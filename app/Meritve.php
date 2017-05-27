<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meritve extends Model
{
    protected $table = 'meritve';
    protected $primaryKey = 'sifra_meritev';

    protected $fillable = ['sifra_meritev', 'ime', 'izbrisan'];

    // Primary key will not be auto incremented
    public $incrementing = false;
    // Model will not be timestamped
    public $timestamps = false;
}
