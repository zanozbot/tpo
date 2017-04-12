<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mailer;
use App\Uporabnik;
use App\Pacient;
use App\Okolis;
use App\AktivacijaRacuna;
use Mail;

class RegistrationController extends Controller
{
	public function index() {
    	$okolisi = Okolis::where('sifra_okolis', '>', 1)->get();
    	return view('pages.register', ['okolisi' => $okolisi]);
    }
    public function register(Request $request) {
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
			'email' => 'Email',
    		'stevilkaKarticeZavarovanja' => 'Številka kartice zdravstvenega zavarovanja',
			'ime' => 'Ime',
    		'priimek' => 'Priimek',
		    'ulica' => 'Ulica',
		    'mesto' => 'Mesto',
		    'datumRojstva' => 'Datum rojstva',
		    'tel_stevilka' => 'Telefonska številka',
			'spol' => 'Spol',
			'geslo' => 'Geslo',
		    'potrdigeslo' => 'Potrdi geslo'
		];
		
		$this->validate($request, [
    		'email' => 'required|email|unique:uporabnik',
    		'stevilkaKarticeZavarovanja' => 'required|numeric',
    		'ime' => 'required',
        	'priimek' => 'required',
			'posta' => 'required|numeric|max:9999|min:1000',
			'okolis' => 'required',
			'ulica' => 'required',
			'kraj' => 'required',	
        	'datumRojstva' => 'required|date_format:d/m/Y',
        	'tel_stevilka' => 'required|max:9',
			'spol' => 'required',
        	'geslo' => 'required',
        	'potrdigeslo' => 'required|same:geslo',
    	], $messages, $customAttributes);	
		
    	$uporabnik = Uporabnik::create([
    		'sifra_vloga' => 6,
    		'ime' => $request['ime'],
    		'priimek' => $request['priimek'],
    		'email' => $request['email'],
    		'geslo' => bcrypt($request['geslo']),
    		'tel_stevilka' => $request['tel_stevilka']
		]);
		
		$sifraOkolis = Okolis::where('ime', $request['okolis'])->get();
		$sifraOkolis = $sifraOkolis[0]->sifra_okolis;
		$datumRojstva = $request['datumRojstva'];   
       	list($dan, $mesec, $leto) = explode("/", $datumRojstva);
        $datumRojstva = $leto.'-'.$mesec.'-'.$dan;
		$spol = 'm';
        if ($request['spol'] == 'Ženski'){
            $spol = 'z';
        }
		$pacient = Pacient::create([
			'stevilka_KZZ' => $request['stevilkaKarticeZavarovanja'],
    		'postna_stevilka' => $request['posta'],
            'pac_stevilka_KZZ' => -1,
            'sifra_okolis' => $sifraOkolis,
			'ulica' => $request['ulica'],
			'kraj' => $request['kraj'],
            'datum_rojstva' => $datumRojstva,
            'spol' => $spol,
			'id_uporabnik' => $uporabnik->id_uporabnik
		]);
		return redirect()->route('register')->with('status', true);
		
		
    	/*
    	$uporabnik = Uporabnik::first(); // Izbriši
    	$aktivacija = AktivacijaRacuna::create([
    		'id_uporabnik' => $uporabnik->id_uporabnik,
    		'token' => str_random(30)
    		]);

    	Mail::to('zan.ozbot@gmail.com')->send(new Mailer($uporabnik));
    	return redirect()->route('home')->with('status', 'Poslali smo vam aktivacijsko kodo. Preverite svoj email.');*/
    }

    public function confirm($token) {
    	$aktivacija = AktivacijaRacuna::find($token);
    	$uporabnik = $aktivacija->uporabnik;

    	if($uporabnik->aktiviran) {
    		return redirect()->route('home')->with('warning', 'Vaš račun je bil že aktiviran.');
    	}
		$uporabnik->aktiviran = true;
		$uporabnik->save();
    	return redirect()->route('home')->with('status', 'Uspešno ste aktivirali vaš račun.');	
    }
}
