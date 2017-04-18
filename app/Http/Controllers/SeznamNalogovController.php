<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DelovniNalog;
use App\Uporabnik;
use App\Pacient;
use App\Obisk;
use App\PatronaznaSestra;
use App\Delavec;
use Auth;

class SeznamNalogovController extends Controller
{

	public function index() {
		//echo DelovniNalog::all();
		if(Auth::check()){
			//Zdravnik
			if(Auth::user()->sifra_vloga == 2){
				$delavec = Delavec::where('delavec.id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
				$forceZdravnik = $delavec[0]->sifra_delavec;
			}
			//Sestra
			if(Auth::user()->sifra_vloga == 4){
				$sestra = PatronaznaSestra::where('id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
				$forceSestra = $sestra[0]->sifra_okolis;
			}
		}
        $mix = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
        				->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
        				->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        				->join('delavec', 'delavec.sifra_delavec', '=', 'delovni_nalog.sifra_delavec')
        				->join('izvajalec_zd', 'izvajalec_zd.sifra_zd', '=', 'delavec.sifra_zd')
        				->join('posta', 'posta.postna_stevilka', '=', 'pacient.postna_stevilka')
        				->join('vrsta_obiska', 'delovni_nalog.sifra_vrsta_obisk', '=', 'vrsta_obiska.sifra_vrsta_obisk')
        				->join('bolezen', 'bolezen.sifra_bolezen', '=', 'delovni_nalog.sifra_bolezen')
        				->orderBy('delovni_nalog.sifra_dn', 'asc')
                        ->get(array(
		                            'pacient.ime as ime_pacienta',
		                            'pacient.priimek as priimek_pacienta',
		                            'email',
		                            'tel_stevilka',
		                            'stevilka_KZZ',
		                            'pac_stevilka_KZZ',
		                            'pacient.postna_stevilka as posta_pacient',
		                            'sifra_okolis',
		                            'pacient.ulica as naslov_pacienta',
		                            'pacient.kraj as kraj_pacienta',
		                            'datum_rojstva',
		                            'spol',
		                            'sifra_dn',
		                            'vrsta_obiska.sifra_vrsta_obisk',
		                            'vrsta_obiska.ime as ime_vrsta_obiska',
		                            'stevilo_epruvet_RdMoRuZe',
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
		        	$mix[$i]->pacienti = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
		        									->join('pacient', 'pacient.stevilka_KZZ', '=', 'delovni_nalog_pacient.pacient_stevilka_KZZ')
		        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        											->join('patronazna_sestra', 'patronazna_sestra.sifra_okolis', '=', 'pacient.sifra_okolis')
		        									->get(array(
		        										'stevilka_KZZ',
		        										'pac_stevilka_KZZ',
		        										'pacient.ime as ime_pacienta',
		        										'datum_rojstva',
		        										'sifra_ps'
		        										));
		        }
		        for ($i=0; $i < count($mix); $i++) { 
		        	$mix[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
		        									->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.pac_stevilka_KZZ')
		        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
		        									->where('delovni_nalog.sifra_dn', '=', $mix[$i]->sifra_dn)
		        									->where('pacient.pac_stevilka_KZZ', '=', $mix[$i]->stevilka_KZZ)
		        									->get(array(
		        										'stevilka_KZZ',
		        										'pacient.ime',
		        										'pacient.priimek',
		        										'pacient.datum_rojstva',
		        										'pac_stevilka_KZZ',
		        										'pacient.ime as ime_pacienta',
		        										'datum_rojstva'
		        										));
		        }

        for ($i=0; $i < count($mix); $i++) { 
        	$mix[$i]->obiski = Obisk::where('sifra_dn', '=', $mix[$i]->sifra_dn)->get();
        }
        $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ',
                                    'pacient.priimek as priimek_pacienta'));
        $sestre = PatronaznaSestra::join('uporabnik', 'patronazna_sestra.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        					->get(array(
        							'uporabnik.ime as ime',
        							'uporabnik.priimek as priimek',
        							'patronazna_sestra.sifra_ps as sifra_ps')); 

		return view('pages.seznamnalog', ['mix' => $mix, 'pacienti' => $pacienti, 'sestre'=>$sestre]);
    }

    public function filter(Request $request){
		$mix = DelovniNalog::query();

		$mix = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
        				->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
        				->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        				->join('delavec', 'delavec.sifra_delavec', '=', 'delovni_nalog.sifra_delavec')
        				->join('izvajalec_zd', 'izvajalec_zd.sifra_zd', '=', 'delavec.sifra_zd')
        				->join('posta', 'posta.postna_stevilka', '=', 'pacient.postna_stevilka')
        				->join('vrsta_obiska', 'delovni_nalog.sifra_vrsta_obisk', '=', 'vrsta_obiska.sifra_vrsta_obisk')
        				->join('bolezen', 'bolezen.sifra_bolezen', '=', 'delovni_nalog.sifra_bolezen')
        				->orderBy('delovni_nalog.sifra_dn', 'asc');

		if($request['odDatum']){
			//Sprememba formata datuma
	        $odDatum = $request['odDatum'];
	       	list($dan, $mesec, $leto) = explode(".", $odDatum);
	        $odDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('delovni_nalog.created_at', '>', date($odDatum));
		}
		if($request['doDatum']){
			//Sprememba formata datuma
	        $doDatum = $request['odDatum'];
	       	list($dan, $mesec, $leto) = explode(".", $doDatum);
	        $doDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('delovni_nalog.created_at', '<', date($doDatum));
		}
		if($request['pacient'] != "-"){
			$mix->where('delovni_nalog_pacient.pacient_stevilka_KZZ', '=', $request['pacient']);
		}
		if($request['obisk'] != "-"){
			$sifra_vrsta_obisk = DB::table('vrsta_obiska')->where('vrsta_obiska.ime', '=', $request['obisk'])->get();
			$sifra_vrsta_obisk = $sifra_vrsta_obisk[0]->sifra_vrsta_obisk;
			$mix->where('delovni_nalog.sifra_vrsta_obisk', '=', $sifra_vrsta_obisk);
		}

		if(isset($forceZdravnik) != null){
			$mix->where('delovni_nalog.sifra_delavec', '=', $forceZdravnik);
		}
		else if($request['izdajalec']){
			$mix->where('delovni_nalog.sifra_delavec', '=', $request['izdajalec']);
		}

		if(isset($forceSestra)){
			$mix->where('delovni_nalog.sifra_okolis', '=', $forceSestra);
		}
		else if($request['zadolzenaSestra'] != "-"){
			$sestra = PatronaznaSestra::where('sifra_ps', '=', $request['zadolzenaSestra'])->get();
			if(count($sestra) > 0)
		    	$okolisSestre = $sestra[0]->sifra_okolis;
		    else 
		    	$okolisSestre = "nope";
		    $mix->where('pacient.sifra_okolis', '=', $okolisSestre);
		}
		$filteredMix = $mix->get(array(
	                            'pacient.ime as ime_pacienta',
	                            'pacient.priimek as priimek_pacienta',
	                            'email',
	                            'tel_stevilka',
	                            'stevilka_KZZ',
	                            'pac_stevilka_KZZ',
	                            'pacient.postna_stevilka as posta_pacient',
	                            'sifra_okolis',
	                            'pacient.ulica as naslov_pacienta',
	                            'pacient.kraj as kraj_pacienta',
	                            'datum_rojstva',
	                            'spol',
	                            'sifra_dn',
	                            'vrsta_obiska.sifra_vrsta_obisk',
	                            'vrsta_obiska.ime as ime_vrsta_obiska',
	                            'stevilo_epruvet_RdMoRuZe',
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
		for ($i=0; $i < count($filteredMix); $i++) { 
        	$filteredMix[$i]->obiski = Obisk::where('sifra_dn', '=', $filteredMix[$i]->sifra_dn)->get();
        }
        for ($i=0; $i < count($filteredMix); $i++) { 
        	$filteredMix[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
        									->get(array(
        										'zdravilo.sifra_zdravilo as sifra_zdravila',
        										'zdravilo.ime as ime_zdravila',
        										'zdravilo.opis as opis_zdravila'
        										));
        }
        for ($i=0; $i < count($filteredMix); $i++) { 
        	$filteredMix[$i]->pacienti = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
        									->join('pacient', 'pacient.stevilka_KZZ', '=', 'delovni_nalog_pacient.pacient_stevilka_KZZ')
        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
											->join('patronazna_sestra', 'patronazna_sestra.sifra_okolis', '=', 'pacient.sifra_okolis')
        									->get(array(
        										'stevilka_KZZ',
        										'pac_stevilka_KZZ',
        										'pacient.ime as ime_pacienta',
        										'datum_rojstva',
        										'sifra_ps'
        										));
        }
        for ($i=0; $i < count($filteredMix); $i++) { 
        	$filteredMix[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
        									->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.pac_stevilka_KZZ')
        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        									->where('delovni_nalog.sifra_dn', '=', $filteredMix[$i]->sifra_dn)
        									->where('pacient.pac_stevilka_KZZ', '=', $filteredMix[$i]->stevilka_KZZ)
        									->get(array(
        										'stevilka_KZZ',
        										'pacient.ime',
        										'pacient.priimek',
        										'pacient.datum_rojstva',
        										'pac_stevilka_KZZ',
        										'pacient.ime as ime_pacienta',
        										'datum_rojstva'
        										));
        }
        $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ'));
        $sestre = PatronaznaSestra::join('uporabnik', 'patronazna_sestra.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        					->get(array(
        							'uporabnik.ime as ime',
        							'uporabnik.priimek as priimek',
        							'patronazna_sestra.sifra_ps as sifra_ps')); 
    	return view('pages.seznamnalog', ['mix' => $filteredMix, 'pacienti' => $pacienti, 'sestre' => $sestre]);
    }
    
}
