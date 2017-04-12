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
        				->join('delavec', 'delavec.sifra_delavec', '=', 'delovni_nalog.sifra_delavec')
        				->join('izvajalec_zd', 'izvajalec_zd.sifra_zd', '=', 'delavec.sifra_zd')
        				->join('posta', 'posta.postna_stevilka', '=', 'pacient.postna_stevilka')
        				->join('vrsta_obiska', 'delovni_nalog.sifra_vrsta_obisk', '=', 'vrsta_obiska.sifra_vrsta_obisk')
        				->join('bolezen', 'bolezen.sifra_bolezen', '=', 'delovni_nalog.sifra_bolezen')
                        ->get(array(
		                            'uporabnik.ime as ime_pacienta',
		                            'priimek',
		                            'email',
		                            'tel_stevilka',
		                            'stevilka_KZZ',
		                            'pacient.postna_stevilka as posta_pacient',
		                            'sifra_okolis',
		                            'pacient.ulica as naslov_pacienta',
		                            'pacient.kraj as kraj_pacienta',
		                            'datum_rojstva',
		                            'spol',
		                            'sifra_dn',
		                            'vrsta_obiska.sifra_vrsta_obisk',
		                            'barva_epruvete',
		                            'stevilo_epruvet',
		                            'datum_prvega_obiska',
		                            'datum_koncnega_obiska',
		                            'datum_obvezen',
		                            'stevilo_obiskov',
		                            'casovni_interval',
		                            'izvajalec_zd.sifra_zd',
		                            'izvajalec_zd.postna_stevilka as posta_izvajalec',
		                            'delavec.sifra_delavec as sifra_delavca',
		                            'izvajalec_zd.naziv as naziv_izvajalca',
		                            'izvajalec_zd.naslov as naslov_izvajalca',
		                            'posta.kraj as kraj_poste',
		                            'vrsta_obiska.ime as ime_vrsta_obiska',
		                            'preventivni',
		                            'bolezen.sifra_bolezen as sifra_bolezni',
		                            'bolezen.ime as ime_bolezni'
                        ));
		        for ($i=0; $i < count($mix); $i++) { 
		        	$mix[$i]->obiski = Obisk::where('sifra_dn', '=', $mix[$i]->sifra_dn)->get();
		        }
		        for ($i=0; $i < count($mix); $i++) { 
		        	$mix[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
		        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
		        									->get(array(
		        										'zdravilo.sifra_zdravilo as sifra_zdravila',
		        										'zdravilo.ime as ime_zdravila',
		        										'zdravilo.opis as opis_zdravila'
		        										));
		        }

        for ($i=0; $i < count($mix); $i++) { 
        	$mix[$i]->obiski = Obisk::where('sifra_dn', '=', $mix[$i]->sifra_dn)->get();
        }

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
