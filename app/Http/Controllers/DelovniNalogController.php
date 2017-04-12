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

            return view('pages.nalog', ['bolezni' => $bolezni, 'zdravila' => $zdravila, 'errPacient' => '']);
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
			'barvaEpruvete.required_if' => 'Izberite ustrezno barvo epruvete iz polja ":attribute".'
		];

    	$customAttributes = [
    		'nalogeObiska' => 'Naloge',
		    'datumPrvegaObiska' => 'Datum prvega obiska',
		    'steviloObiskov' => 'Število obiskov',
		    'casovniInterval' => 'Časovni interval',
		    'koncniDatum' => 'Končni datum',
		    'obveznoDrzanjeDatuma' => 'Vrsta datuma',
		    'steviloEpruvet' => 'Število epruvet',
		    'barvaEpruvete' => 'Barva epruvete',
		    'ustreznaZdravila' => 'Ustrezna zdravila',
            'imeBolezni' => 'Ime bolezni'
		];

		//preverjanje pacienta v bazi
		$pacient = Pacient::where('stevilka_KZZ', $request['vezaniPacient'][0])->get();
		if(!$pacient->first())
		{
            $msg = 'Pacient s številko KZZ '.$request['vezaniPacient'][0].' v bazi še ne obstaja.';
            if (!$request['vezaniPacient'][0]) {
                $msg = 'Polje "Vezani pacienti" mora biti izpolnjeno';
            }
            return view('pages.nalog', ['bolezni' => $bolezni, 'zdravila' => $zdravila, 'errPacient' => $msg]);
		}

        //preverjanje ali je casovni interval izpolnjen
        $prevKoncniDatum = 'required_without:casovniInterval|date_format:d/m/Y|after_or_equal:datumPrvegaObiska';
        if($request['casovniInterval'] != []){
            $prevKoncniDatum = 'required_without:casovniInterval';
        }

    	//preverjanje pravilnosti podatkov
        $this->validate($request, [
                'imeBolezni' => 'required',
                'ustreznaZdravila' => 'required_if:nalogeObiska,Aplikacija injekcij',
                'barvaEpruvete' => 'required_if:nalogeObiska,Odvzem krvi',
                'steviloEpruvet' => 'required_if:nalogeObiska,Odvzem krvi',
                'datumPrvegaObiska' => 'required|date_format:d/m/Y|after_or_equal:tomorrow',
                'steviloObiskov' => 'required|numeric|max:10',
                'casovniInterval' => 'required_without:koncniDatum',
                'koncniDatum' => $prevKoncniDatum,
                'obveznoDrzanjeDatuma' => 'required'
            ], $messages, $customAttributes);

        //Sprememba formata datuma
        $datumZacetni = $request['datumPrvegaObiska'];
       	list($dan, $mesec, $leto) = explode("/", $datumZacetni);
        $datumZacetni = $leto.'-'.$mesec.'-'.$dan;

        $datumKoncni = $request['koncniDatum'];
        if($datumKoncni){
            list($dan, $mesec, $leto) = explode("/", $datumKoncni);
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

        //barva epruvete na NULL, če ne gre za odvzem krvi(sifra=60)
        $barvaEpruvete = NULL;
        if ($sifraVrstaObiska == 60){
            $barvaEpruvete = $request['barvaEpruvete'];
        }

        //pridobivanje šifre delavca
        $sifraDelavca = Delavec::where('id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
        $sifraDelavca = $sifraDelavca[0]->sifra_delavec;

        $delovniNalog = DelovniNalog::create([
    		'sifra_delavec' => $sifraDelavca,
            'sifra_bolezen' => $sifraBolezni,
    		'sifra_vrsta_obisk' => $sifraVrstaObiska,
    		'barva_epruvete' => $barvaEpruvete,
            'stevilo_epruvet' => $request['steviloEpruvet'],
            'datum_prvega_obiska' => $datumZacetni,
            'datum_koncnega_obiska' => $datumKoncni,
    		'datum_obvezen' => $datumObvezen,
    		'stevilo_obiskov' => $request['steviloObiskov'],
    		'casovni_interval' => $request['casovniInterval']
    		]);

        $sifraNovegaDN = DelovniNalog::max('sifra_dn');

        //dodajanje v vmesno tabelo delovni_nalog_zdravilo
        if ($sifraVrstaObiska == 50){
            $ustreznaZdravila = $_POST['ustreznaZdravila'];
            for ($x = 0; $x < count($ustreznaZdravila); $x++) {
                $zdraviloIn = Zdravilo::where('ime', $ustreznaZdravila[$x])->get();
                $zdraviloIn[0]->delovni_nalog()->attach($sifraNovegaDN);
            }
        }

        //dodajanje v vmesno tabelo delovni_nalog_pacient
        $pacientiVsi = $_POST['vezaniPacient'];
        for ($x = 0; $x < count($pacientiVsi); $x++) {
            $pacientIn = Pacient::where('stevilka_KZZ', $pacientiVsi[$x])->get();
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
                $sifraPlan = Plan::where('datum_plan', '=', '0000-01-01')->get();
                if(!$sifraPlan->first()){
                    $planCreate = Plan::create([
                                'datum_plan' => '0000-01-01'
                            ]);
                    $sifraPlan = Plan::max('sifra_plan');
                } else {
                    $sifraPlan = $sifraPlan[0]->sifra_plan;
                }
                if($datumObvezen == 1){
                    //kreiraj ali dodaj v plan
                    $plan = Plan::where('datum_plan', $datumObiska)->get();
                    if(!$plan->first()){
                        //plan v bazi še ne obstaja
                        $planCreate = Plan::create([
                                'datum_plan' => $datumObiska
                            ]);
                        $sifraPlan = Plan::max('sifra_plan');
                    } else {
                        //plan v bazi že obstaja
                        $sifraPlan = Plan::where('datum_plan', '=', $datumObiska)->get();
                        $sifraPlan = $sifraPlan[0]->sifra_plan;
                    }
                }
                $obisk = Obisk::create([
                    'sifra_dn' => $sifraNovegaDN,
                    'sifra_plan' => $sifraPlan,
                    'originalna_sifra_plan' => $sifraPlan,
                    'sifra_ps' => $sifraPS,
                    'datum_obiska' => $datumObiska,
                    'originalni_datum' => $datumObiska
                    ]);

                $korakIn = $x*$korak;
                $datumObiska = date('Y-m-d', strtotime($datumZacetni.' + '.round($korakIn).' days'));
            }
            $obisk = Obisk::create([
                    'sifra_dn' => $sifraNovegaDN,
                    'sifra_plan' => $sifraPlan,
                    'originalna_sifra_plan' => $sifraPlan,
                    'sifra_ps' => $sifraPS,
                    'datum_obiska' => $datumKoncni,
                    'originalni_datum' => $datumKoncni
                    ]);
        } else {
            $date1 = date_create((string)$datumZacetni);
            $korak = $request['casovniInterval'];
            $datumObiska = $datumZacetni;
            for ($x = 0; $x < $request['steviloObiskov']; $x++) {
                $sifraPlan = Plan::where('datum_plan', '=', '0000-01-01')->get();
                if(!$sifraPlan->first()){
                    $planCreate = Plan::create([
                                'datum_plan' => '0000-01-01'
                            ]);
                    $sifraPlan = Plan::max('sifra_plan');
                } else {
                    $sifraPlan = $sifraPlan[0]->sifra_plan;
                }
                
                if($datumObvezen == 1){
                    //kreiraj ali dodaj v plan
                    $plan = Plan::where('datum_plan', $datumObiska)->get();
                    if(!$plan->first()){
                        //plan v bazi še ne obstaja
                        $planCreate = Plan::create([
                                'datum_plan' => $datumObiska
                            ]);
                        $sifraPlan = Plan::max('sifra_plan');
                    } else {
                        //plan v bazi že obstaja
                        $sifraPlan = Plan::where('datum_plan', '=', $datumObiska)->get();
                        $sifraPlan = $sifraPlan[0]->sifra_plan;
                    }
                }
                $obisk = Obisk::create([
                    'sifra_dn' => $sifraNovegaDN,
                    'sifra_plan' => $sifraPlan,
                    'originalna_sifra_plan' => $sifraPlan,
                    'sifra_ps' => $sifraPS,
                    'datum_obiska' => $datumObiska,
                    ]);
                $datumObiska = date('Y-m-d', strtotime($datumObiska.' + '.$korak.' days'));
            }
        }

        return redirect()->route('nalog')->with('status', true);
    }
}
