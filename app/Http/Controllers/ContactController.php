<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mailer;
use App\Uporabnik;
use App\SorodstvenoRazmerje;
use App\KontaktnaOseba;
use Auth;

class ContactController extends Controller
{
	public function index() {
		$razmerja = SorodstvenoRazmerje::all();
		$kontakti = KontaktnaOseba::where('id_uporabnik', Auth::user()->id_uporabnik)
					->join('sorodstveno_razmerje', 'kontaktna_oseba.sifra_razmerje', '=', 'sorodstveno_razmerje.sifra_razmerje')
					->get(array(
						'sorodstveno_razmerje.ime as razmerje',
						'kontaktna_oseba.ime as ime',
						'priimek',
						'tel_stevilka',
						'postna_stevilka',
						'kraj',
						'ulica'
					
						)
					);
    	return view('pages.contact', ['razmerja' => $razmerja,'kontakti' => $kontakti]);
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
		    'tel_stevilka' => 'Telefonska številka',
    		'priimek' => 'Priimek',
			'okolis' => 'Okoliši',
			'razmerje' => 'Razmerje',
		    'ulica' => 'Ulica',
		    'kraj' => 'Kraj',
			'posta' => 'Poštna številka'
		];
		
		$this->validate($request, [
    		'ime' => 'required',
        	'priimek' => 'required',
			'razmerje' => 'required',
			'posta' => 'required|numeric|max:9999|min:1000',
			'ulica' => 'required',
			'kraj' => 'required',	
			'tel_stevilka' => 'required|max:9',
    	], $messages, $customAttributes);
		
		$sifraRazmerje = SorodstvenoRazmerje::where('ime', $request['razmerje'])->get();
		$sifraRazmerje = $sifraRazmerje[0]->sifra_razmerje;
		
		$kontakt = KontaktnaOseba::create([
    		'postna_stevilka' => $request['posta'],
			'ime' => $request['ime'],
			'priimek' => $request['priimek'],
			'sifra_razmerje' => $sifraRazmerje,
			'ulica' => $request['ulica'],
			'kraj' => $request['kraj'],
    		'tel_stevilka' => $request['tel_stevilka'],
			'id_uporabnik' => Auth::user()->id_uporabnik
		]);
		return redirect()->route('contact')->with('status', true);
    }
}
