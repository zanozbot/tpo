<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Uporabnik extends Authenticatable
{
    use Notifiable;

    protected $table = 'uporabnik';
    protected $primaryKey = 'id_uporabnik';

    protected $fillable = [
        'ime', 'email', 'geslo', 'sifra_vloga', 'tel_stevilka', 'priimek',
    ];

    protected $hidden = [
        'geslo', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->geslo;
    }

    public function vloga() {
    	return $this->belongsTo('App\Vloga', 'sifra_vloga', 'sifra_vloga');
    }

    public function delavec() {
    	return $this->hasOne('App\Delavec', 'id_uporabnik', 'id_uporabnik');
    }

    public function patronazna_sestra() {
    	return $this->hasOne('App\PatronaznaSestra', 'id_uporabnik', 'id_uporabnik');
    }

    public function pacient() {
    	return $this->hasOne('App\Pacient', 'id_uporabnik', 'id_uporabnik');
    }
}
