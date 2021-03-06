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
use App\Plan;
use App\Porocilo;
use App\Nadomescanje;
use Auth;

class SeznamObiskovController extends Controller
{

	public function index() {
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
		$mix = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
					->join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
					->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
					->join('posta', 'posta.postna_stevilka', '=', 'pacient.postna_stevilka')
        			->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        			->join('vrsta_obiska', 'delovni_nalog.sifra_vrsta_obisk', '=', 'vrsta_obiska.sifra_vrsta_obisk')
        			->join('bolezen', 'bolezen.sifra_bolezen', '=', 'delovni_nalog.sifra_bolezen')
        			->join('delavec', 'delavec.sifra_delavec', '=', 'delovni_nalog.sifra_delavec')
    				->join('izvajalec_zd', 'izvajalec_zd.sifra_zd', '=', 'delavec.sifra_zd')
    				->join('plan', 'plan.sifra_plan', '=', 'obisk.sifra_plan')
        			->orderBy('plan.datum_plan', 'asc');

		if(isset($forceSestra)){
			$mix->where('pacient.sifra_okolis', '=', $forceSestra);
		}

		if(isset($forceSestra)){
			$nadomescanjeSestra = PatronaznaSestra::where('sifra_okolis', '=',  $forceSestra)->value('sifra_ps');
			$nadomescanja = Nadomescanje::all();
			foreach ($nadomescanja as $nadomescanje) {
				if ($nadomescanje->nadomestna_sifra_ps == $nadomescanjeSestra){
					$mix->orwhere('obisk.sifra_obisk', '=', $nadomescanje->sifra_obisk);
				}
			}
		}

		$mix = $mix->get(array(
					'obisk.sifra_obisk',
					'datum_obiska as prvotni_datum_obiska',
					'datum_opravljenosti_obiska as dejanski_datum_obiska',
                    'pacient.ime as ime_pacienta',
                    'pacient.priimek as priimek_pacienta',
                    'email',
                    'opravljen',
                    'nadomescanje',
                    'tel_stevilka',
                    'stevilka_KZZ',
                    'pac_stevilka_KZZ',
                    'pacient.postna_stevilka as posta_pacient',
                    'sifra_okolis',
                    'pacient.ulica as naslov_pacienta',
                    'pacient.kraj as kraj_pacienta',
                    'datum_rojstva',
                    'spol',
                    'obisk.sifra_ps',
                    'obisk.sifra_nadomestne_ps',
                    'delovni_nalog.sifra_dn',
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
                    'bolezen.ime as ime_bolezni',
                    'plan.sifra_plan',
                    'plan.datum_plan as predvideni_datum_obiska'
        ));

        for ($i=0; $i < count($mix); $i++) {
        	$datum_obiska = Plan::where('sifra_plan', '=', $mix[$i]->sifra_plan)->get();
        	$mix[$i]->datum_obiska = $datum_obiska[0]->datum_plan;

        	$mix[$i]->sestra = PatronaznaSestra::join('uporabnik', 'uporabnik.id_uporabnik', '=', 'patronazna_sestra.id_uporabnik')
        										->where('sifra_okolis', '=', $mix[$i]->sifra_okolis)
        										->get();
        	$nadomescanja = Nadomescanje::where('sifra_obisk', $mix[$i]->sifra_obisk)
        								->where('sifra_ps', $mix[$i]->sestra[0]->sifra_ps)
        								->get();
        	if(count($nadomescanja)){
        		$mix[$i]->sestra = PatronaznaSestra::join('uporabnik', 'uporabnik.id_uporabnik', '=', 'patronazna_sestra.id_uporabnik')
        										->where('sifra_ps', $nadomescanja[0]->nadomestna_sifra_ps)
        										->get();
        	}

        	$mix[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
        									->where('delovni_nalog.sifra_dn', $mix[$i]->sifra_dn)
        									->get(array(
        										'zdravilo.sifra_zdravilo as sifra_zdravila',
        										'zdravilo.ime as ime_zdravila',
        										'zdravilo.opis as opis_zdravila'
        										));

        	$mix[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
                                                    ->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
                                                    ->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
                                                    ->where('delovni_nalog.sifra_dn', '=', $mix[$i]->sifra_dn)
                                                    ->where('pacient.pac_stevilka_KZZ', '!=', -1)
                                                    ->get(array(
                                                        'stevilka_KZZ',
                                                        'pacient.ime',
                                                        'pacient.priimek',
                                                        'pacient.datum_rojstva',
                                                        'pac_stevilka_KZZ',
                                                        'pacient.ime as ime_pacienta',
                                                        'datum_rojstva'
                                                        ));

       		$mix[$i]->porocilo = Porocilo::join('aktivnost', 'porocilo.aid', '=', 'aktivnost.aid')
       										->where('porocilo.sifra_obisk', '=', $mix[$i]->sifra_obisk)
       										->get();
        }

		$izdajatelji = Delavec::join('uporabnik', 'delavec.id_uporabnik', '=', 'uporabnik.id_uporabnik')
							->join('vloga', 'uporabnik.sifra_vloga', '=', 'vloga.sifra_vloga')
							->get(array(
										'uporabnik.ime as ime_delavca',
										'priimek as priimek_delavca',
										'delavec.sifra_delavec as sifra_delavca',
										'vloga.ime as ime_vloge',
										'uporabnik.id_uporabnik'
								));
        $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ',
                                    'pacient.priimek as priimek_pacienta'));
        $sestre = PatronaznaSestra::join('uporabnik', 'patronazna_sestra.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        						  ->get(array(
		        							'uporabnik.ime as ime',
		        							'uporabnik.priimek as priimek',
		        							'patronazna_sestra.sifra_ps as sifra_ps',
		        							'patronazna_sestra.id_uporabnik as id_sestre'));
		return view('pages.seznamobisk', ['mix' => $mix, 'pacienti' => $pacienti, 'sestre' => $sestre, 'izdajatelji' => $izdajatelji]);
    }

    public function filter(Request $request){
    	if(Auth::check()){
			//Zdravnik
			if(Auth::user()->sifra_vloga == 2){
				$delavec = Delavec::where('delavec.id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
				$forceZdravnik = $delavec[0]->sifra_delavec;
			}
			//Sestra
			if(Auth::user()->sifra_vloga == 4){
				$sestra = PatronaznaSestra::where('patronazna_sestra.id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
				$forceSestra = $sestra[0]->sifra_okolis;
			}
		}

		$mix = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
					->join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
					->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
					->join('posta', 'posta.postna_stevilka', '=', 'pacient.postna_stevilka')
        			->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        			->join('vrsta_obiska', 'delovni_nalog.sifra_vrsta_obisk', '=', 'vrsta_obiska.sifra_vrsta_obisk')
        			->join('bolezen', 'bolezen.sifra_bolezen', '=', 'delovni_nalog.sifra_bolezen')
    				->join('delavec', 'delavec.sifra_delavec', '=', 'delovni_nalog.sifra_delavec')
    				->join('izvajalec_zd', 'izvajalec_zd.sifra_zd', '=', 'delavec.sifra_zd')
    				->join('plan', 'plan.sifra_plan', '=', 'obisk.sifra_plan');

		if(isset($forceSestra)){
			$s = PatronaznaSestra::where('sifra_okolis', '=', $forceSestra)->value('sifra_ps');
        	//$mix->where('obisk.sifra_ps', '=', $s);
        	//$mix->orWhere('obisk.sifra_nadomestne_ps', '=', $s);
        	$mix->where(function($query) use ($s) {
        		$query->where('obisk.sifra_ps', '=', $s)
        			->orWhere('obisk.sifra_nadomestne_ps', '=', $s);
        	});
        	//return $lul->get();
		} else if($request['nadomestnaSestra'] != "-" && $request['zadolzenaSestra'] != "-"){
        	$mix->where('obisk.sifra_ps', '=', $request['zadolzenaSestra']);
        	$mix->orWhere('obisk.sifra_nadomestne_ps', '=', $request['nadomestnaSestra']);
		} else if ($request['nadomestnaSestra'] == "-" && $request['zadolzenaSestra'] != "-") {
        	$mix->where('obisk.sifra_ps', '=', $request['zadolzenaSestra']);
		} else  if ($request['nadomestnaSestra'] != "-" && $request['zadolzenaSestra'] == "-"){
        	$mix->where('obisk.sifra_nadomestne_ps', '=', $request['nadomestnaSestra']);
		}
		
		if($request['predvideniOdDatum']){
			//Sprememba formata datuma
	        $odDatum = $request['predvideniOdDatum'];
	       	list($dan, $mesec, $leto) = explode(".", $odDatum);
	        $odDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('plan.datum_plan', '>=', date($odDatum));
		}
		if($request['predvideniDoDatum']){
			//Sprememba formata datuma
	        $doDatum = $request['predvideniDoDatum'];
	       	list($dan, $mesec, $leto) = explode(".", $doDatum);
	        $doDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('plan.datum_plan', '<=', date($doDatum));
		}
		if($request['dejanskiOdDatum']){
			//Sprememba formata datuma
	        $odDatum = $request['dejanskiOdDatum'];
	       	list($dan, $mesec, $leto) = explode(".", $odDatum);
	        $odDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('datum_opravljenosti_obiska', '>=', date($odDatum));
		}
		if($request['dejanskiDoDatum']){
			//Sprememba formata datuma
	        $doDatum = $request['dejanskiDoDatum'];
	       	list($dan, $mesec, $leto) = explode(".", $doDatum);
	        $doDatum = $leto.'-'.$mesec.'-'.$dan;;
			$mix->whereDate('datum_opravljenosti_obiska', '<=', date($doDatum));
		}
		if($request['pacient'] != "-"){
			$mix->where('pacient.stevilka_KZZ', '=', $request['pacient']);
		}
		if($request['obisk'] != "-"){
			$sifra_vrsta_obisk = DB::table('vrsta_obiska')->where('vrsta_obiska.ime', '=', $request['obisk'])->get();
			$sifra_vrsta_obisk = $sifra_vrsta_obisk[0]->sifra_vrsta_obisk;
			$mix->where('delovni_nalog.sifra_vrsta_obisk', '=', $sifra_vrsta_obisk);
		}
		if($request['stanjeObiska'] == "Opravljen"){
			$mix->where('obisk.opravljen', '=', 1);
		} else if ($request['stanjeObiska'] == "Neopravljen"){
			$mix->where('obisk.opravljen', '=', 0);
		}

		if(isset($forceZdravnik)){
			$mix->where('delovni_nalog.sifra_delavec', '=', $forceZdravnik);
		}
		else if($request['izdajatelj'] != "-"){
			$mix->where('delovni_nalog.sifra_delavec', '=', $request['izdajatelj']);
		}

		$filteredMix = $mix->orderBy('plan.datum_plan', 'asc')
							->get(array(
										'obisk.sifra_obisk',
										'datum_obiska as prvotni_datum_obiska',
										'datum_opravljenosti_obiska as dejanski_datum_obiska',
					                    'pacient.ime as ime_pacienta',
					                    'pacient.priimek as priimek_pacienta',
					                    'email',
					                    'opravljen',
					                    'nadomescanje',
					                    'tel_stevilka',
					                    'stevilka_KZZ',
					                    'pac_stevilka_KZZ',
					                    'pacient.postna_stevilka as posta_pacient',
					                    'sifra_okolis',
					                    'pacient.ulica as naslov_pacienta',
					                    'pacient.kraj as kraj_pacienta',
					                    'datum_rojstva',
					                    'spol',
					                    'obisk.sifra_ps',
					                    'obisk.sifra_nadomestne_ps',
					                    'delovni_nalog.sifra_dn',
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
					                    'bolezen.ime as ime_bolezni',
					                    'plan.sifra_plan',
					                    'plan.datum_plan as predvideni_datum_obiska'
					        ));

		for ($i=0; $i < count($filteredMix); $i++) {
        	$datum_obiska = Plan::where('sifra_plan', '=', $filteredMix[$i]->sifra_plan)->get();
        	$filteredMix[$i]->datum_obiska = $datum_obiska[0]->datum_plan;

        	$filteredMix[$i]->sestra = PatronaznaSestra::join('uporabnik', 'uporabnik.id_uporabnik', '=', 'patronazna_sestra.id_uporabnik')
        										->where('sifra_okolis', '=', $filteredMix[$i]->sifra_okolis)
        										->get();
        	$nadomescanja = Nadomescanje::where('sifra_obisk', $filteredMix[$i]->sifra_obisk)
        								->where('sifra_ps', $filteredMix[$i]->sestra[0]->sifra_ps)
        								->get();
        	if(count($nadomescanja)){
        		$filteredMix[$i]->sestra = PatronaznaSestra::join('uporabnik', 'uporabnik.id_uporabnik', '=', 'patronazna_sestra.id_uporabnik')
        										->where('sifra_ps', $nadomescanja[0]->nadomestna_sifra_ps)
        										->get();
        	}

        	$filteredMix[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
        									->where('delovni_nalog.sifra_dn', $filteredMix[$i]->sifra_dn)
        									->get(array(
        										'zdravilo.sifra_zdravilo as sifra_zdravila',
        										'zdravilo.ime as ime_zdravila',
        										'zdravilo.opis as opis_zdravila'
        										));

        	$filteredMix[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
                                                    ->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
                                                    ->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
                                                    ->where('delovni_nalog.sifra_dn', '=', $filteredMix[$i]->sifra_dn)
                                                    ->where('pacient.pac_stevilka_KZZ', '!=', -1)
                                                    ->get(array(
                                                        'stevilka_KZZ',
                                                        'pacient.ime',
                                                        'pacient.priimek',
                                                        'pacient.datum_rojstva',
                                                        'pac_stevilka_KZZ',
                                                        'pacient.ime as ime_pacienta',
                                                        'datum_rojstva'
                                                        ));

     		$filteredMix[$i]->porocilo = Porocilo::join('aktivnost', 'porocilo.aid', '=', 'aktivnost.aid')
       										->where('porocilo.sifra_obisk', '=', $filteredMix[$i]->sifra_obisk)
       										->get();
        }

        $izdajatelji = Delavec::join('uporabnik', 'delavec.id_uporabnik', '=', 'uporabnik.id_uporabnik')
							->join('vloga', 'uporabnik.sifra_vloga', '=', 'vloga.sifra_vloga')
							->get(array(
										'uporabnik.ime as ime_delavca',
										'priimek as priimek_delavca',
										'delavec.sifra_delavec as sifra_delavca',
										'vloga.ime as ime_vloge',
										'uporabnik.id_uporabnik'
								));
        $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ',
                                    'pacient.priimek as priimek_pacienta'));
        $sestre = PatronaznaSestra::join('uporabnik', 'patronazna_sestra.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        						  ->get(array(
		        							'uporabnik.ime as ime',
		        							'uporabnik.priimek as priimek',
		        							'patronazna_sestra.sifra_ps as sifra_ps',
		        							'patronazna_sestra.id_uporabnik as id_sestre'));
    	return view('pages.seznamobisk', ['mix' => $filteredMix, 'pacienti' => $pacienti, 'sestre' => $sestre, 'izdajatelji' => $izdajatelji]);
    }
    
}
