<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DelovniNalog;
use App\Pacient;
use App\Bolezen;
use App\Zdravilo;
use App\VrstaObiska;
use App\Obisk;
use App\Delavec;
use App\Plan;
use App\PatronaznaSestra;

class DelovniNalogController extends Controller
{
    public function index() {
        if (Auth::check()) {
            if (Auth::user()->sifra_vloga == 3 || Auth::user()->sifra_vloga == 2){
                $bolezni = Bolezen::all();
                $zdravila = Zdravilo::all();
                $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ',
                                    'pacient.priimek as priimek_pacienta'));
            return view('pages.nalog', ['pacienti' => $pacienti, 'bolezni' => $bolezni, 'zdravila' => $zdravila, 'errPacient' => '']);
            } else {
                return redirect()->route('home');
            }
        } else {
           return redirect()->route('home');
        }
    }

    public function getFilteredResults(Request $request){
        
    }

    public function create(Request $request) {

        $bolezni = Bolezen::all();
        $zdravila = Zdravilo::all();


    	$messages = [
		    'required' => 'Polje ":attribute" mora biti izpolnjeno.',
		    'max' => 'Polje ":attribute" je lahko največ :max.',
		    'numeric' => 'V polje ":attribute" vpišite številko.',
		    'date_format' => 'Oblika datuma v polju ":attribute" ni pravilna.',
		    'koncniDatum.after_or_equal' => 'Datum v polju ":attribute" mora biti kasnejši od datuma v polju "Datum prvega obiska".',
		    'datumPrvegaObiska.after_or_equal' => 'Datum v polju ":attribute" mora biti enak ali kasnejši od današnjega.',
			'koncniDatum.required_without' => 'Polje ":attribute" mora biti izpolnjeno, če je polje "Časovni interval" neizpolnjeno.',
			'casovniInterval.required_without' => 'Polje ":attribute" mora biti izpolnjeno, če je polje "Končni datum" neizpolnjeno.',
			'required_if' => 'Polje ":attribute" mora biti izpolnjeno.',
			'ustreznaZdravila.required_if' => 'Izberite ustrezna zdravila iz polja ":attribute".',
		];

    	$customAttributes = [
    		'nalogeObiska' => 'Naloge',
		    'datumPrvegaObiska' => 'Datum prvega obiska',
		    'steviloObiskov' => 'Število obiskov',
		    'casovniInterval' => 'Časovni interval',
		    'koncniDatum' => 'Končni datum',
		    'obveznoDrzanjeDatuma' => 'Vrsta datuma',
            'steviloRdeca' => 'Število rdečih epruvet',
            'steviloModra' => 'Število modrih epruvet',
            'steviloRumena' => 'Število rumenih epruvet',
            'steviloZelena' => 'Število zelenih epruvet',
		    'ustreznaZdravila' => 'Ustrezna zdravila',
            'imeBolezni' => 'Ime bolezni'
		];

		//preverjanje da je dodajanje pacientov mogoče le v primeru obiska otročnice
        $pacientiVsi = array_unique($_POST['vezaniPacient']);
        if (count($pacientiVsi) > 1 && $request['nalogeObiska'] != 'Obisk otročnice') {
            $msg = 'Dodajanje več pacientov je mogoče samo, če je izbrana naloga "Obisk otročnice".';
            $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ',
                                    'pacient.priimek as priimek_pacienta'));
            return view('pages.nalog', ['bolezni' => $bolezni, 'zdravila' => $zdravila, 'errPacient' => $msg, 'pacienti' => $pacienti]);
        }

        //preverjanje pacienta v bazi
        foreach ($pacientiVsi as $pac) {
            $pacient = Pacient::where('stevilka_KZZ', $pac)->get();
            if(!$pacient->first())
            {
                $msg = 'Pacient s številko kartice zdravstvenega zavarovanja '.$pac.' v bazi še ne obstaja.';
                if (!$pac) {
                    $msg = 'Polje "Vezani pacienti" mora biti izpolnjeno';
                }
                $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ',
                                    'pacient.priimek as priimek_pacienta'));
                return view('pages.nalog', ['bolezni' => $bolezni, 'zdravila' => $zdravila, 'errPacient' => $msg, 'pacienti' => $pacienti]);
            }
        }

        //preverjanje ali je casovni interval izpolnjen
        $prevKoncniDatum = 'required_without:casovniInterval|date_format:d.m.Y|after_or_equal:datumPrvegaObiska';
        if($request['casovniInterval'] != []){
            $prevKoncniDatum = 'required_without:casovniInterval';
        }

    	//preverjanje pravilnosti podatkov
        $this->validate($request, [
                'imeBolezni' => 'required',
                'ustreznaZdravila' => 'required_if:nalogeObiska,Aplikacija injekcij',
                'steviloRdeca' => 'required_if:nalogeObiska,Odvzem krvi|numeric',
                'steviloModra' => 'required_if:nalogeObiska,Odvzem krvi|numeric',
                'steviloRumena' => 'required_if:nalogeObiska,Odvzem krvi|numeric',
                'steviloZelena' => 'required_if:nalogeObiska,Odvzem krvi|numeric',
                'datumPrvegaObiska' => 'required|date_format:d.m.Y|after_or_equal:tomorrow',
                'steviloObiskov' => 'required|numeric|max:10',
                'casovniInterval' => 'required_without:koncniDatum',
                'koncniDatum' => $prevKoncniDatum,
                'obveznoDrzanjeDatuma' => 'required'
            ], $messages, $customAttributes);
        
        //Sprememba formata datuma
        $datumZacetni = $request['datumPrvegaObiska'];
       	list($dan, $mesec, $leto) = explode(".", $datumZacetni);
        $datumZacetni = $leto.'-'.$mesec.'-'.$dan;

        $datumKoncni = $request['koncniDatum'];
        if($datumKoncni){
            list($dan, $mesec, $leto) = explode(".", $datumKoncni);
            $datumKoncni = $leto.'-'.$mesec.'-'.$dan;
        }        

        //obveznost datuma kot 0 ali 1
        $datumObvezen = 0;
        if ($request['obveznoDrzanjeDatuma'] == 'Obvezen'){
            $datumObvezen = 1;
        }

        //pridobivanje sifre bolezni in vrste obiska
        $sifraBolezni = Bolezen::where('ime', $request['imeBolezni'])->get();
        $sifraVrstaObiska = VrstaObiska::where('ime', $request['nalogeObiska'])->get();
        $sifraBolezni = $sifraBolezni[0]->sifra_bolezen;
        $sifraVrstaObiska = $sifraVrstaObiska[0]->sifra_vrsta_obisk;

        //pridobivanje šifre delavca
        $sifraDelavca = Delavec::where('id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
        $sifraDelavca = $sifraDelavca[0]->sifra_delavec;

        //kreiranje stringa steviloEpruvet
        $steviloEpruvet = $request['steviloRdeca']." ".$request['steviloModra']." ".$request['steviloRumena']." ".$request['steviloZelena'];

        $delovniNalog = DelovniNalog::create([
    		'sifra_delavec' => $sifraDelavca,
            'sifra_bolezen' => $sifraBolezni,
    		'sifra_vrsta_obisk' => $sifraVrstaObiska,
            'stevilo_epruvet_RdMoRuZe' => $steviloEpruvet,
            'datum_prvega_obiska' => $datumZacetni,
            'datum_koncnega_obiska' => $datumKoncni,
    		'datum_obvezen' => $datumObvezen,
    		'stevilo_obiskov' => $request['steviloObiskov'],
    		'casovni_interval' => $request['casovniInterval']
    		]);

        $sifraNovegaDN = $delovniNalog->sifra_dn;

        //dodajanje v vmesno tabelo delovni_nalog_zdravilo
        if ($sifraVrstaObiska == 50){
            $ustreznaZdravila = $_POST['ustreznaZdravila'];
            for ($x = 0; $x < count($ustreznaZdravila); $x++) {
                $zdraviloIn = Zdravilo::where('ime', $ustreznaZdravila[$x])->get();
                $zdraviloIn[0]->delovni_nalog()->attach($sifraNovegaDN);
            }
        }

        //dodajanje v vmesno tabelo delovni_nalog_pacient
        foreach ($pacientiVsi as $pac) {
            $pacientIn = Pacient::where('stevilka_KZZ', $pac)->get();
            $pacientIn[0]->delovni_nalog()->attach($sifraNovegaDN);
        }

        //pridobivanje sifre MS
        $pacKZZ = $delovniNalog->pacient()->get();
        $pacKZZ = $pacKZZ[0]->pivot->pacient_stevilka_KZZ;
        $okolis = Pacient::where('stevilka_KZZ', '=', $pacKZZ)->get();
        $okolis = $okolis[0]->sifra_okolis;
        $sifraPS = PatronaznaSestra::where('sifra_okolis', '=', $okolis)->get();
        $sifraPS = $sifraPS[0]->sifra_ps;
        //kreiranje obiskov
        if ($datumKoncni) {
            $date1 = date_create((string)$datumZacetni);
            $date2 = date_create((string)$datumKoncni);
            $diff = date_diff($date1,$date2);
            $stDni = $diff->format("%a");
            $korak = $stDni/$request['steviloObiskov'];
            $datumObiska = $datumZacetni;
            for ($x = 1; $x <= $request['steviloObiskov']-1; $x++) {
                //kreiraj ali dodaj v plan
                $plan = Plan::where('datum_plan', $datumObiska)->where('sifra_ps_plan', '=', $sifraPS)->get();
                if(!$plan->first()){
                    //plan v bazi še ne obstaja
                    $planCreate = Plan::create([
                            'datum_plan' => $datumObiska,
                            'sifra_ps_plan' => $sifraPS
                        ]);
                    $sifraPlan = $planCreate->sifra_plan;
                } else {
                    //plan v bazi že obstaja
                    $sifraPlan = $plan[0]->sifra_plan;
                }
                if ($datumObvezen == 0){
                    $originalnaSifraPlana = -1;
                } else {
                    $originalnaSifraPlana = $sifraPlan;
                }

                //preverjanje ali je datum sobota ali nedelja
                $novDatumObiska = $datumObiska;
                if (date('N', strtotime($novDatumObiska)) == 6) {
                    //datum je na soboto
                    $novDatumObiska = date('Y-m-d', strtotime('-1 day', strtotime($novDatumObiska)));
                } else if (date('N', strtotime($novDatumObiska)) == 7){
                    //datum je na nedeljo
                    $novDatumObiska = date('Y-m-d', strtotime('+1 day', strtotime($novDatumObiska)));
                }
                $obisk = Obisk::create([
                    'sifra_dn' => $sifraNovegaDN,
                    'sifra_plan' => $sifraPlan,
                    'originalna_sifra_plan' => $originalnaSifraPlana,
                    'sifra_ps' => $sifraPS,
                    'datum_obiska' => $novDatumObiska
                    ]);

                $korakIn = $x*$korak;
                $datumObiska = date('Y-m-d', strtotime($datumZacetni.' + '.round($korakIn).' days'));
            }

            //preverjanje ali je datum sobota ali nedelja
            $novDatumObiska = $datumKoncni;
            if (date('N', strtotime($novDatumObiska)) == 6) {
                //datum je na soboto
                $novDatumObiska = date('Y-m-d', strtotime('-1 day', strtotime($novDatumObiska)));
            } else if (date('N', strtotime($novDatumObiska)) == 7){
                //datum je na nedeljo
                $novDatumObiska = date('Y-m-d', strtotime('+1 day', strtotime($novDatumObiska)));
            }
            $obisk = Obisk::create([
                    'sifra_dn' => $sifraNovegaDN,
                    'sifra_plan' => $sifraPlan,
                    'originalna_sifra_plan' => $sifraPlan,
                    'sifra_ps' => $sifraPS,
                    'datum_obiska' => $novDatumObiska
                    ]);
        } else {
            $date1 = date_create((string)$datumZacetni);
            $korak = $request['casovniInterval'];
            $datumObiska = $datumZacetni;
            for ($x = 0; $x < $request['steviloObiskov']; $x++) {
                
                //kreiraj ali dodaj v plan
                $plan = Plan::where('datum_plan', $datumObiska)->where('sifra_ps_plan', '=', $sifraPS)->get();
                if(!$plan->first()){
                    //plan v bazi še ne obstaja
                    $planCreate = Plan::create([
                            'datum_plan' => $datumObiska,
                            'sifra_ps_plan' => $sifraPS
                        ]);
                    $sifraPlan = $planCreate->sifra_plan;
                } else {
                    //plan v bazi že obstaja
                    $sifraPlan = $plan[0]->sifra_plan;
                }
                if ($datumObvezen == 0){
                    $originalnaSifraPlana = -1;
                } else {
                    $originalnaSifraPlana = $sifraPlan;
                }

                //preverjanje ali je datum sobota ali nedelja
                $novDatumObiska = $datumObiska;
                if (date('N', strtotime($novDatumObiska)) == 6) {
                    //datum je na soboto
                    $novDatumObiska = date('Y-m-d', strtotime('-1 day', strtotime($novDatumObiska)));
                } else if (date('N', strtotime($novDatumObiska)) == 7){
                    //datum je na nedeljo
                    $novDatumObiska = date('Y-m-d', strtotime('+1 day', strtotime($novDatumObiska)));
                }
                $obisk = Obisk::create([
                    'sifra_dn' => $sifraNovegaDN,
                    'sifra_plan' => $sifraPlan,
                    'originalna_sifra_plan' => $originalnaSifraPlana,
                    'sifra_ps' => $sifraPS,
                    'datum_obiska' => $novDatumObiska
                    ]);
                $datumObiska = date('Y-m-d', strtotime($datumObiska.' + '.$korak.' days'));
            }
        }
        $pacienti = Pacient::get(array(
                                    'pacient.ime as ime_pacienta',
                                    'stevilka_KZZ',
                                    'pacient.priimek as priimek_pacienta'));
        return redirect()->route('nalog')->with('status', true,'pacienti',$pacienti);
    }
}

