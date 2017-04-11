<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DelovniNalog;
use App\Pacient;
use App\Bolezen;
use App\Zdravilo;
use App\VrstaObiska;

class DelovniNalogController extends Controller
{
    public function index() {
        $bolezni = Bolezen::all();
        $zdravila = Zdravilo::all();

    	return view('pages.nalog', ['bolezni' => $bolezni, 'zdravila' => $zdravila, 'errPacient' => '']);
    }

    public function create(Request $request) {

        $bolezni = Bolezen::all();
        $zdravila = Zdravilo::all();

    	$messages = [
		    'required' => 'Polje ":attribute" mora biti izpoljeno.',
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
    		'vezaniPacient' => 'Vezani pacienti',
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
		$pacient = Pacient::where('stevilka_KZZ', $request['vezaniPacient'])->get();
		if(!$pacient->first())
		{
            return view('pages.nalog', ['bolezni' => $bolezni, 'zdravila' => $zdravila, 'errPacient' => 'Pacient s številko KZZ '.$request['vezaniPacient'].' v bazi še ne obstaja.']);
		}

        //preverjanje ali je casovni interval izpolnjen
        $prevKoncniDatum = 'required_without:casovniInterval|date_format:d/m/Y|after_or_equal:datumPrvegaObiska';
        if($request['casovniInterval'] != []){
            $prevKoncniDatum = 'required_without:casovniInterval';
        }

    	//preverjanje pravilnosti podatkov
        $this->validate($request, [
                'vezaniPacient' => 'required|numeric',
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

        $datumObvezen = 0;
        if ($request['obveznoDrzanjeDatuma'] == 'Obvezen'){
            $datumObvezen = 1;
        }

        //pridobivanje sifre bolezni in vrste obiska
        $sifraBolezni = Bolezen::where('ime', $request['imeBolezni'])->get();
        $sifraVrstaObiska = VrstaObiska::where('ime', $request['nalogeObiska'])->get();
        $sifraBolezni = $sifraBolezni[0]->sifra_bolezen;
        $sifraVrstaObiska = $sifraVrstaObiska[0]->sifra_vrsta_obisk;

        /*TODO:
            -izdelava delovnega naloga(sifra_delavec nadomestiti s šifro prijavljenega delavca)
        */

        $delovniNalog = DelovniNalog::create([
    		'sifra_delavec' => 123,//spremeniti v prijavljenega zdravnika/vodjoZD, ki izpolnjuje delovni nalog
            'sifra_bolezen' => $sifraBolezni,
    		'sifra_vrsta_obisk' => $sifraVrstaObiska,
    		'barva_epruvete' => $request['barvaEpruvete'],
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
            foreach ($ustreznaZdravila as $zdravilo)
                $zdraviloIn = Zdravilo::where('ime', $zdravilo)->get();
                $zdraviloIn[0]->delovni_nalog()->attach($sifraNovegaDN);
        }

        //dodajanje v vmesno tabelo delovni_nalog_pacient
        $pacientIn = Pacient::where('stevilka_KZZ', $request['vezaniPacient'])->get();
        $pacientIn[0]->delovni_nalog()->attach($sifraNovegaDN);

        /*TODO:
            -kreiranje obiskov glede na delovni nalog
        */

        if ($request['koncniDatum'] == '') {
            //racunamo koncni datum na podlagi časovnega intervala in števila obiskov
        } else {
            //racunamo časovni interval na podlagi števila obiskov in končnega datuma
        }

        return redirect()->route('nalog')->with('status', true);
    }
}
