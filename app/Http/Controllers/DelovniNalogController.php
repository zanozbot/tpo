<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DelovniNalog;
use App\Pacient;

class DelovniNalogController extends Controller
{
    public function index() {
    	return view('pages.nalog');
    }

    public function create(Request $request) {

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
		    'ustreznaZdravila' => 'Ustrezna zdravila'
		];

		//preverjanje pacienta v bazi
		/*$pacient = Pacient::where('stevilka_KZZ', $request['vezaniPacient'])->get();
		if($pacient == [])
		{
		    $validator->getMessageBag()->add('vezaniPacient', 'Pacient s številko KZZ '.$request['vezaniPacient'].' ne obstaja v bazi pacientov.');
		}*/

    	//preverjanje pravilnosti podatkov
        $this->validate($request, [
                'vezaniPacient' => 'required|numeric',
                'ustreznaZdravila' => 'required_if:nalogeObiska,Aplikacija injekcij',
                'barvaEpruvete' => 'required_if:nalogeObiska,Odvzem krvi',
                'steviloEpruvet' => 'required_if:nalogeObiska,Odvzem krvi',
                'datumPrvegaObiska' => 'required|date_format:d/m/Y|after_or_equal:tomorrow',
                'steviloObiskov' => 'required|numeric|max:10',
                'casovniInterval' => 'required_without:koncniDatum',
                'koncniDatum' => 'required_without:casovniInterval|date_format:d/m/Y|after_or_equal:datumPrvegaObiska',
                'obveznoDrzanjeDatuma' => 'required'
            ], $messages, $customAttributes);

        //Sprememba formata datuma
        $datumZacetni = $request['datumPrvegaObiska'];
       	list($dan, $mesec, $leto) = explode("/", $datumZacetni);
        $datumZacetni = $leto.'-'.$mesec.'-'.$dan;

        $datumKoncni = $request['datumPrvegaObiska'];
       	list($dan, $mesec, $leto) = explode("/", $datumKoncni);
        $datumKoncni = $leto.'-'.$mesec.'-'.$dan;

        /*TODO:
			-migracija baze(barva_krvi->barva_epruvete, atribut koncni_datum)
			-izdelava delovnega naloga(ko bo narejena prijava v sistem in bodo v bazi šifranti)
			-izdelava obiskov(ko bo narejena izdelava delovnega naloga)
		*/

        $delovniNalog = DelovniNalog::create([
    		'stevilka_KZZ' => $request['vezaniPacient'],
    		'sifra_delavec' => 123,//spremeniti v prijavljenega zdravnika/vodjoZD, ki izpolnjuje delovni nalog
    		'sifra_vrsta_obisk' => $request['nalogeObiska'],
    		'barva_krvi' => $request['barvaEpruvete'],//v bazi spremeniti barva_krvi v barva_epruvete
    		'datumPrvegaObiska' => $datumZacetni,
    		'datum_obvezen' => $request['obveznoDrzanjeDatuma'],
    		'stevilo_obiskov' => $request['steviloObiskov'],
    		'casovni_interval' => $request['casovniInterval'],
    		//dodati koncni datum v bazo
    		]);

        return redirect()->route('nalog')->with('status', true);
    }
}
