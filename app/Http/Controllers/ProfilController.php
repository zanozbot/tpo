<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mailer;
use App\Uporabnik;
use App\Pacient;
use App\Okolis;
use App\Posta;
use App\SorodstvenoRazmerje;
use App\AktivacijaRacuna;
use Mail;
use Auth;

class ProfilController extends Controller
{

	public function datum($datum) {
		$array=explode('-',$datum);
		$datum=$array[2] . '.' . $array[1] . '.' . $array[0];
		return $datum;
	}
	public function index() {
    	$okolisi = Okolis::all();
		$razmerja = SorodstvenoRazmerje::all();
		$glavni = Auth::user()->pacient[0];
		$glavni->datum_rojstva=$this->datum($glavni->datum_rojstva);
		$poste = Posta::all();
    	return view('pages.profil', ['glavni' => $glavni, 'okolisi' => $okolisi, 'razmerja' => $razmerja, 'poste' => $poste]);
    }

    public function update(Request $request) {
    	// Validacija + kreacija

		$messages = [
	    'same'    => 'Polja ":attribute" in ":other" se morata ujemati.',
	    'required' => 'Polje ":attribute" mora biti izpoljeno.',
	    'unique' => 'Uporabnik s takim ":attribute" že obstaja.',
	    'stevilkaKarticeZavarovanja.max' => 'Polje ":attribute" ima lahko največ 10 številk.',
	    'posta.max' => 'Polje ":attribute" ima lahko največ 4 številke.',
	    'email' => 'Vnešen email mora biti veljaven.',
			'date_format' => 'Oblika datuma v polju ":attribute" ni pravilna.'
		];
		$customAttributes = [
			'stevilkaKarticeZavarovanja' => 'Številka kartice zdravstvenega zavarovanja',
			'ime' => 'Ime',
			'priimek' => 'Priimek',
			'okolis' => 'Okoliši',
			'razmerje' => 'Razmerje',
			'ulica' => 'Ulica',
			'kraj' => 'Kraj',
			'posta' => 'Poštna številka',
			'datumRojstva' => 'Datum rojstva',
			'spol' => 'Spol',
		];

		$this->validate($request, [
			'ime' => 'required',
	    	'priimek' => 'required',
			'posta' => 'required|numeric|max:9999|min:1000',
			'okolis' => 'required',
			'ulica' => 'required',
			'kraj' => 'required',
	    	'datumRojstva' => 'required|date_format:d.m.Y',
			'spol' => 'required',
    	], $messages, $customAttributes);

		$sifraOkolis = Okolis::where('ime', $request['okolis'])->get();
		$sifraOkolis = $sifraOkolis[0]->sifra_okolis;
		$datumRojstva = $request['datumRojstva'];
       	list($dan, $mesec, $leto) = explode(".", $datumRojstva);
        $datumRojstva = $leto.'-'.$mesec.'-'.$dan;
		$spol = 'm';
        if ($request['spol'] == 'female'){
            $spol = 'z';
        }
		$glavni = Auth::user()->pacient[0];
		$glavni->update([
					'postna_stevilka' => $request['posta'],
					'ime' => $request['ime'],
					'priimek' => $request['priimek'],
					'sifra_okolis' => $sifraOkolis,
					'ulica' => $request['ulica'],
					'kraj' => $request['kraj'],
					'datum_rojstva' => $datumRojstva,
					'spol' => $spol,
				]);
		$uporabnik = Auth::user();
		$uporabnik->update([
					'ime' => $request['ime'],
					'priimek' => $request['priimek'],
				]);
		return redirect()->route('profil')->with('status', true);
    }
}
