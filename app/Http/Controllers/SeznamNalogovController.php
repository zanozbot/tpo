<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DelovniNalog;
use App\Uporabnik;
use App\Pacient;
use App\Obisk;

class SeznamNalogovController extends Controller
{

	public function index() {
        $mix = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
        				->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
        				->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
                        ->get(array(
		                            'ime',
		                            'priimek',
		                            'email',
		                            'tel_stevilka',
		                            'stevilka_KZZ',
		                            'postna_stevilka',
		                            'sifra_okolis',
		                            'naslov',
		                            'datum_rojstva',
		                            'spol',
		                            'sifra_dn',
		                            'sifra_delavec',
		                            'sifra_bolezen',
		                            'sifra_vrsta_obisk',
		                            'barva_epruvete',
		                            'datum_prvega_obiska',
		                            'datum_koncnega_obiska',
		                            'datum_obvezen',
		                            'stevilo_obiskov',
		                            'casovni_interval'
                        ));
        for ($i=0; $i < count($mix); $i++) { 
        	$mix[$i]->obiski = Obisk::where('sifra_dn', '=', $mix[$i]->sifra_dn)->get();
        }
        
		return view('pages.seznamnalog', ['mix' => $mix]);
    }
    
}
