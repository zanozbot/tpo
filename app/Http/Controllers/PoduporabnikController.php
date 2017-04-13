<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mailer;
use App\Uporabnik;
use App\Pacient;
use App\Okolis;
use App\SorodstvenoRazmerje;
use App\AktivacijaRacuna;
use Mail;
use Auth;

class PoduporabnikController extends Controller
{
	public function index() {
    	$okolisi = Okolis::where('sifra_okolis', '>', 1)->get();
		$razmerja = SorodstvenoRazmerje::all();
    	return view('pages.poduporabnik', ['okolisi' => $okolisi, 'razmerja' => $razmerja]);
    }

    public function create(Request $request) {
    	// Validacija + kreacija 
		
		$messages = [
		    'same'    => 'Polja ":attribute" in ":other" se morata ujemati.',
		    'required' => 'Polje ":attribute" mora biti izpoljeno.',
		    'unique' => 'Uporabnik s takim ":attribute" že obstaja.',
		    'max' => 'Polje ":attribute" ima lahko največ :max številk.',
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
    		'stevilkaKarticeZavarovanja' => 'required|numeric',
    		'ime' => 'required',
        	'priimek' => 'required',
			'razmerje' => 'required',
			'posta' => 'required|numeric|max:9999|min:1000',
			'okolis' => 'required',
			'ulica' => 'required',
			'kraj' => 'required',	
        	'datumRojstva' => 'required|date_format:d/m/Y',
			'spol' => 'required',
    	], $messages, $customAttributes);
		
		$sifraOkolis = Okolis::where('ime', $request['okolis'])->get();
		$sifraOkolis = $sifraOkolis[0]->sifra_okolis;
		$sifraRazmerje = SorodstvenoRazmerje::where('ime', $request['razmerje'])->get();
		$sifraRazmerje = $sifraRazmerje[0]->sifra_razmerje;
		$datumRojstva = $request['datumRojstva'];   
       	list($dan, $mesec, $leto) = explode("/", $datumRojstva);
        $datumRojstva = $leto.'-'.$mesec.'-'.$dan;
		$spol = 'm';
        if ($request['spol'] == 'female'){
            $spol = 'z';
        }
		
		$pacient = Pacient::create([
			'stevilka_KZZ' => $request['stevilkaKarticeZavarovanja'],
    		'postna_stevilka' => $request['posta'],
			'ime' => $request['ime'],
			'priimek' => $request['priimek'],
			'sifra_razmerje' => $sifraRazmerje,
            'sifra_okolis' => $sifraOkolis,
			'ulica' => $request['ulica'],
			'kraj' => $request['kraj'],
            'datum_rojstva' => $datumRojstva,
            'spol' => $spol,
			'id_uporabnik' => Auth::user()->id_uporabnik
		]);
		return redirect()->route('poduporabnik')->with('status', true);
    }
}