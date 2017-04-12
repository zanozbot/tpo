<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DelovniNalog;
use App\Uporabnik;
use App\Pacient;
use App\Obisk;
use App\PatronaznaSestra;

class SeznamNalogovController extends Controller
{

	public function index() {
		//echo DelovniNalog::all();
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
       // echo $mix;
        for ($i=0; $i < count($mix); $i++) { 
        	$mix[$i]->obiski = Obisk::where('sifra_dn', '=', $mix[$i]->sifra_dn)->get();
        }

        //echo $mix;
		return view('pages.seznamnalog', ['mix' => $mix]);
    }

    public function filter(Request $request){
		$mix = DelovniNalog::query();

		$mix = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
		        				->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
		        				->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik');
		if($request['odDatum']){
			//Sprememba formata datuma
	        $odDatum = $request['odDatum'];
	       	list($dan, $mesec, $leto) = explode("/", $odDatum);
	        $odDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('delovni_nalog.created_at', '>', date($odDatum));
		}
		if($request['doDatum']){
			//Sprememba formata datuma
	        $doDatum = $request['odDatum'];
	       	list($dan, $mesec, $leto) = explode("/", $doDatum);
	        $doDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('delovni_nalog.created_at', '<', date($doDatum));
		}
		if($request['pacient']){
			$mix->where('delovni_nalog_pacient.pacient_stevilka_KZZ', '=', $request['pacient']);
		}
		if($request['obisk'] != "-"){
			$sifra_vrsta_obisk = DB::table('vrsta_obiska')->where('vrsta_obiska.ime', '=', $request['obisk'])->get();
			$sifra_vrsta_obisk = $sifra_vrsta_obisk[0]->sifra_vrsta_obisk;
			$mix->where('delovni_nalog.sifra_vrsta_obisk', '=', $sifra_vrsta_obisk);
		}
		if($request['izdajalec']){
			$mix->where('delovni_nalog.sifra_delavec', '=', $request['izdajalec']);
		}
		if($request['zadolzenaSestra']){
			$sestra = PatronaznaSestra::where('sifra_ps', '=', $request['zadolzenaSestra'])->get();
			if(count($sestra) > 0)
		    	$okolisSestre = $sestra[0]->sifra_okolis;
		    else 
		    	$okolisSestre = "nope";
		    $mix->where('pacient.sifra_okolis', '=', $okolisSestre);
		}
		$filteredMix = $mix->get(array(
		                            'ime',
		                            'priimek',
		                            'email',
		                            'tel_stevilka',
		                            'stevilka_KZZ',
		                            'postna_stevilka',
		                            'sifra_okolis',
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
       // echo $mix;
        for ($i=0; $i < count($filteredMix); $i++) { 
        	$filteredMix[$i]->obiski = Obisk::where('sifra_dn', '=', $filteredMix[$i]->sifra_dn)->get();
        }
    	//echo $request;
    	return view('pages.seznamnalog', ['mix' => $filteredMix]);
    }
    
}
