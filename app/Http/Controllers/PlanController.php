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

class PlanController extends Controller
{
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
		        for ($i=0; $i < count($mix1); $i++) { 
		        	$mix1[$i]->obiski = Obisk::where('sifra_dn', '=', $mix1[$i]->sifra_dn)->where('opravljen', '=', 0)
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

		        $mix2 = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
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

		        for ($i=0; $i < count($mix2); $i++) { 
		        	$mix2[$i]->obiski = Obisk::where('sifra_dn', '=', $mix2[$i]->sifra_dn)->where('opravljen', '=', 0)
								->where('sifra_plan', '=', $sifraPlan)->get();
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

		       	//return $mix[0]->obiski[0]->sifra_obisk;
		    	return view('pages.plan', ['sifraPlan' => $sifraPlan, 'sifraSestre' => $sifraSestre, 'mix1' => $mix1, 'mix2' => $mix2]);
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
}
