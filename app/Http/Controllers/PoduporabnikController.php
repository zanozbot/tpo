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

class PoduporabnikController extends Controller
{

	public function datum($datum) {
		$array=explode('-',$datum);
		$datum=$array[2] . '.' . $array[1] . '.' . $array[0];
		return $datum;
	}
	public function index() {
    	$okolisi = Okolis::all();
		$razmerja = SorodstvenoRazmerje::where('izbrisan', false)->get();
		$glavni = Auth::user()->pacient[0];				
		$poduporabniki = Pacient::where('pac_stevilka_KZZ', $glavni->stevilka_KZZ)
						->join('sorodstveno_razmerje', 'pacient.sifra_razmerje', '=', 'sorodstveno_razmerje.sifra_razmerje')
						->join('okolis', 'pacient.sifra_okolis', '=', 'okolis.sifra_okolis')
						->get(array(
								'stevilka_KZZ',
								'pacient.ime as ime',
								'okolis.ime as okolis',
								'sorodstveno_razmerje.ime as razmerje',
								'priimek',
								'ulica',
								'kraj',
								'postna_stevilka',
								'datum_rojstva',
								'spol'
							)
						 );
			foreach( $poduporabniki as $poduporabnik ) {
				$poduporabnik->datum_rojstva = $this->datum($poduporabnik->datum_rojstva);

			}
			$glavni->datum_rojstva=$this->datum($glavni->datum_rojstva);
			$poste = Posta::where('izbrisan', false)->get();
    	return view('pages.poduporabnik', ['glavni' => $glavni, 'okolisi' => $okolisi, 'razmerja' => $razmerja, 'poduporabniki' => $poduporabniki, 'poste' => $poste]);
    }

    public function create(Request $request) {
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
			'stevilkaKarticeZavarovanja' => 'required|numeric|max:2147483647',
			'ime' => 'required',
	    	'priimek' => 'required',
			'razmerje' => 'required',
			'posta' => 'required|numeric|max:9999|min:1000',
			'okolis' => 'required',
			'ulica' => 'required',
			'kraj' => 'required',
	    	'datumRojstva' => 'required|date_format:d.m.Y',
			'spol' => 'required',
    	], $messages, $customAttributes);

		$sifraOkolis = Okolis::where('ime', $request['okolis'])->get();
		$sifraOkolis = $sifraOkolis[0]->sifra_okolis;
		$sifraRazmerje = SorodstvenoRazmerje::where('ime', $request['razmerje'])->get();
		$sifraRazmerje = $sifraRazmerje[0]->sifra_razmerje;
		$datumRojstva = $request['datumRojstva'];
       	list($dan, $mesec, $leto) = explode(".", $datumRojstva);
        $datumRojstva = $leto.'-'.$mesec.'-'.$dan;
		$spol = 'm';
        if ($request['spol'] == 'female'){
            $spol = 'z';
        }
		$glavni = Auth::user()->pacient[0];
		if(Pacient::where('stevilka_KZZ', '=', $request['stevilkaKarticeZavarovanja'])->exists()){
				Pacient::find($request['stevilkaKarticeZavarovanja']) ->update([
					'postna_stevilka' => $request['posta'],
					'ime' => $request['ime'],
					'priimek' => $request['priimek'],
					'sifra_razmerje' => $sifraRazmerje,
					'sifra_okolis' => $sifraOkolis,
					'ulica' => $request['ulica'],
					'kraj' => $request['kraj'],
					'datum_rojstva' => $datumRojstva,
					'spol' => $spol,
				]);
				return redirect()->route('poduporabnik');
		}
		else {
			$uporabnik = Uporabnik::create([
				'ime' => $request['ime'],
				'priimek' => $request['priimek'],
				'sifra_vloga' => 6,
				'aktiviran' => 1
			]);
			$pacient = Pacient::create([
				'stevilka_KZZ' => $request['stevilkaKarticeZavarovanja'],
				'postna_stevilka' => $request['posta'],
				'pac_stevilka_KZZ' => $glavni->stevilka_KZZ,
				'ime' => $request['ime'],
				'priimek' => $request['priimek'],
				'sifra_razmerje' => $sifraRazmerje,
				'sifra_okolis' => $sifraOkolis,
				'ulica' => $request['ulica'],
				'kraj' => $request['kraj'],
				'datum_rojstva' => $datumRojstva,
				'spol' => $spol,
				'id_uporabnik' => $uporabnik->id_uporabnik
			]);
			return redirect()->route('poduporabnik')->with('status', true);
		}

    }
}
