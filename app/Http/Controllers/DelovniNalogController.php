<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DelovniNalog;
use App\Pacient;
use App\Bolezen;
use App\Zdravilo;

class DelovniNalogController extends Controller
{
    public function index() {
        $bolezni = Bolezen::all();
        $zdravila = Zdravilo::all();

    	return view('pages.nalog', ['bolezni' => $bolezni, 'zdravila' => $zdravila]);
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
		    'ustreznaZdravila' => 'Ustrezna zdravila',
            'sifraBolezni' => 'Šifra bolezni'
		];

		//preverjanje pacienta v bazi
		$pacient = Pacient::where('stevilka_KZZ', $request['vezaniPacient'])->get();
		if($pacient == [])
		{
            //kako dodati error message v error sporočila, ki jih vrne validate()?
		    return 'Pacient ne obstaja.';
		}

        if ($request['koncniDatum'] == '') {
            //racunamo koncni datum na podlagi časovnega intervala in števila obiskov
        } else {
            //racunamo časovni interval na podlagi števila obiskov in končnega datuma
        }

        $datumObvezen = 0;
        if ($request['obveznoDrzanjeDatuma'] == 'Obvezen') {
            $datumObvezen = 1;
        }

    	//preverjanje pravilnosti podatkov
        $this->validate($request, [
                'vezaniPacient' => 'required|numeric',
                'sifraBolezni' => 'required',
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
			-izdelava delovnega naloga(ko bo narejena prijava v sistem in bodo v bazi šifranti)
			-izdelava obiskov(ko bo narejena izdelava delovnega naloga)
		*/

        $datumObvezen = 0;
        if ($request['obveznoDrzanjeDatuma'] == 'Obvezen'){
            $datumObvezen = 1;
        }

        $delovniNalog = DelovniNalog::create([
    		'stevilka_KZZ' => $request['vezaniPacient'],
    		'sifra_delavec' => 123,//spremeniti v prijavljenega zdravnika/vodjoZD, ki izpolnjuje delovni nalog
            'sifra_bolezen' => $request['sifraBolezni'],
    		'sifra_vrsta_obisk' => $request['nalogeObiska'],
    		'barva_epruvete' => $request['barvaEpruvete'],
            'datum_prvega_obiska' => $datumZacetni,
            'datum_koncnega_obiska' => $datumKoncni,
    		'datum_obvezen' => $datumObvezen,
    		'stevilo_obiskov' => $request['steviloObiskov'],
    		'casovni_interval' => $request['casovniInterval'],
    		]);

        $ustreznaZdravila = $_POST['ustreznaZdravila'];
        foreach ($ustreznaZdravila as $zdravilo)
            $zdravilo = Zdravilo::where('ime', $zdravilo);
            $zdravilo->delovni_nalog()->attach($sifra_dn);

        return redirect()->route('nalog')->with('status', true);
    }
}
