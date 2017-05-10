<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Obisk;
use App\Uporabnik;
use App\Pacient;
use App\DelovniNalog;
use App\PatronaznaSestra;
use App\Delavec;
use App\Aktivnost;
use App\Porocilo;
use App\Plan;
use Carbon\Carbon;

class PlanController extends Controller
{

	public function vnesiPodatke(Request $request, $sifraObisk, $sifraPlan){
		
		foreach ($request->all() as $key => $value){
			if (is_numeric($key)){
				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
					->where('aid', '=', $key)->first();
				if(isset($porocilo)){
					$porocilo->opis = $value;
					$porocilo->save();
				} else {
					Porocilo::create([
						'sifra_obisk' => $sifraObisk,
						'aid' => $key,
						'opis' => $value
					]);
				}
			} else {
				$opis = null;
				$aid = 1;
				if ($key == "82_rdeca"){
					$opis = (object)array(
						"rdeca" => $value, 
						"modra" => $request->input('82_modra'),
						"zelena" => $request->input('82_zelena'),
						"rumena" => $request->input('82_rumena')
						);
					$jsonOpis = json_encode($opis);

				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
					->where('aid', '=', "82")->first();
				if(isset($porocilo)){
					$porocilo->opis = $jsonOpis;
					$porocilo->save();
				} else {
					Porocilo::create([
						'sifra_obisk' => $sifraObisk,
						'aid' => "82",
						'opis' => $jsonOpis
						]);
					}
				}
				if (strpos($key, 'sis') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"sis" => $value,
						"dia" => $request->input($aid[0].'_dia')
						);
					$jsonOpis = json_encode($opis);
					$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'mot') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"mot" => $value,
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'terapija') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"terapija" => $value,
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'fizicna') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"fizicna" => $value,
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'num') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"num" => $value,
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'datum') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"datum" => $value,
						"teza" => $request->input($aid[0].'_teza'),
						"visina" => $request->input($aid[0].'_visina'),
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'vid') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"vid" => $value,
						"vonj" => $request->input($aid[0].'_vonj'),
						"sluh" => $request->input($aid[0].'_sluh'),
						"okus" => $request->input($aid[0].'_okus'),
						"otip" => $request->input($aid[0].'_otip'),
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
				$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'rdeca') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"rdeca" => $value,
						"modra" => $request->input($aid[0].'_modra'),
						"rumena" => $request->input($aid[0].'_rumena'),
						"zelena" => $request->input($aid[0].'_zelena')
						);
					$jsonOpis = json_encode($opis);
					$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'odvisnost') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"odvisnost" => $value,
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
					$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'urin') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"urin" => $value,
						"blato" => $request->input($aid[0].'_blato')
						);
					$jsonOpis = json_encode($opis);
					$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'dane') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"dane" => $value,
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
					$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}
				if (strpos($key, 'defekacija') !== false){
					preg_match('!\d+!', $key, $aid);
					$opis = (object)array(
						"defekacija" => $value,
						"opis" => $request->input($aid[0].'_opis')
						);
					$jsonOpis = json_encode($opis);
					$porocilo = Porocilo::where('sifra_obisk', '=', $sifraObisk)
						->where('aid', '=', $aid[0])->first();
					if(isset($porocilo)){
						$porocilo->opis = $jsonOpis;
						$porocilo->save();
					} else {
						Porocilo::create([
							'sifra_obisk' => $sifraObisk,
							'aid' => $aid[0],
							'opis' => $jsonOpis
							]);
					}
				}

				
			}
		}
		$datum = Plan::where('sifra_plan', '=', $sifraPlan)->value('datum_plan');
		return redirect()->route('plan')->with(['sifraPlan' => $sifraPlan, 'datumPlana' => $datum]);
	}

    public function index() {
    	$sifraPlan = 0;
		if (Auth::check()) {
            if (Auth::user()->sifra_vloga == 4){
                if (session()->has('sifraPlan')){
		        	$sifraPlan = session('sifraPlan');
		        }

		        //pridobivanje šifre delavca
		        $sifraSestre = PatronaznaSestra::where('id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
		        $sifraSestre = $sifraSestre[0]->sifra_ps;

		        $mix1 = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
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
		        for ($i=0; $i < count($mix1); $i++) { 
		        	$mix1[$i]->obiski = Obisk::where('obisk.sifra_dn', '=', $mix1[$i]->sifra_dn)->where('opravljen', '=', 0)
		        				->join('delovni_nalog', 'delovni_nalog.sifra_dn', '=', 'obisk.sifra_dn')
		        				->where('datum_obvezen', '=', 0)
								->where('sifra_plan', '!=', $sifraPlan)->get();
		        }
		        for ($i=0; $i < count($mix1); $i++) { 
		        	$mix1[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
		        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
		        									->get(array(
		        										'zdravilo.sifra_zdravilo as sifra_zdravila',
		        										'zdravilo.ime as ime_zdravila',
		        										'zdravilo.opis as opis_zdravila'
		        										));
		        }
		        for ($i=0; $i < count($mix1); $i++) { 
		        	$mix1[$i]->pacienti = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
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
		        for ($i=0; $i < count($mix1); $i++) { 
		        	$mix1[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
		        									->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.pac_stevilka_KZZ')
		        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
		        									->where('delovni_nalog.sifra_dn', '=', $mix1[$i]->sifra_dn)
		        									->where('pacient.pac_stevilka_KZZ', '=', $mix1[$i]->stevilka_KZZ)
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

		        $mix2 = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
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
		                            'bolezen.ime as ime_bolezni'
                        ));

		        for ($i=0; $i < count($mix2); $i++) { 
		        	$mix2[$i]->obiski = Obisk::where('obisk.sifra_dn', '=', $mix2[$i]->sifra_dn)->where('opravljen', '=', 0)
								->where('sifra_plan', '=', $sifraPlan)->get();
		        }
		        for ($i=0; $i < count($mix2); $i++){

		        	$mix2[$i]->aktivnosti = Aktivnost::where('sifra_storitve', '=', $mix2[$i]->sifra_vrsta_obisk)->get();
		        	if($mix2[$i]->sifra_vrsta_obisk == 20)
		        		$mix2[$i]->aktivnostiNovorojencek = Aktivnost::where('sifra_storitve', '=', "30")->get();
		        }
		        for ($i=0; $i < count($mix2); $i++) { 
		        	$mix2[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
		        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
		        									->get(array(
		        										'zdravilo.sifra_zdravilo as sifra_zdravila',
		        										'zdravilo.ime as ime_zdravila',
		        										'zdravilo.opis as opis_zdravila'
		        										));
		        }
				for ($i=0; $i < count($mix2); $i++) { 
		        	$mix2[$i]->pacienti = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
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
		        for ($i=0; $i < count($mix2); $i++) { 
		        	$mix2[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
		        									->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.pac_stevilka_KZZ')
		        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
		        									->where('delovni_nalog.sifra_dn', '=', $mix2[$i]->sifra_dn)
		        									->where('pacient.pac_stevilka_KZZ', '=', $mix2[$i]->stevilka_KZZ)
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
		        $datum = Plan::where('sifra_plan', '=', $sifraPlan)->value('datum_plan');
		    	return view('pages.plan', ['datumPlan' => $datum, 'sifraPlan' => $sifraPlan, 'sifraSestre' => $sifraSestre, 'mix1' => $mix1, 'mix2' => $mix2]);
            } else {
                return redirect()->route('home');
            }
        } else {
           return redirect()->route('home');
        }        
    }

    public function dodaj($sifraPlan, $sifraObiska) {
    	if (Auth::check()) {
            if (Auth::user()->sifra_vloga == 4){
                $obisk = Obisk::where('sifra_obisk', '=', $sifraObiska)->update(['sifra_plan' => $sifraPlan]);
    	
    			return redirect()->route('plan')->with('sifraPlan', $sifraPlan);
            } else {
                return redirect()->route('home');
            }
        } else {
           return redirect()->route('home');
        }     
    	
    }

    public function odstrani($sifraPlan, $sifraObiska) {
    	if (Auth::check()) {
            if (Auth::user()->sifra_vloga == 4){
            	$originalSifraPlana = Obisk::where('sifra_obisk', '=', $sifraObiska)->get();
            	$originalSifraPlana = $originalSifraPlana[0]->originalna_sifra_plan;
                $obisk = Obisk::where('sifra_obisk', '=', $sifraObiska)->update(['sifra_plan' => $originalSifraPlana]);
    	
    			return redirect()->route('plan')->with('sifraPlan', $sifraPlan);
            } else {
                return redirect()->route('home');
            }
        } else {
           return redirect()->route('home');
        }     
    	
    }
}
