<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZaklepanjeIP extends Model
{
    protected $table = 'zaklepanje_ip';
    protected $primaryKey = 'ip';

    // Primary key will not be auto incremented
    public $incrementing = false;

    protected $fillable = [
        'ip', 'poskus'
    ];
}
