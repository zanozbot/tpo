<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Vloga;
use App\Uporabnik;
use App\PatronaznaSestra;
use App\Delavec;
use App\IzvajalecZD;
use App\Okolis;

class AdministratorController extends Controller
{
    public function index() {
    	$vloge = Vloga::where('sifra_vloga', '>', 1)
                ->where('sifra_vloga', '<', 6)
                ->where('izbrisan', false)
                ->get();
        $izvajalci = IzvajalecZD::where('izbrisan', false)->get();
        $okolisi = Okolis::all();
    	return view('pages.admin', ['vloge' => $vloge, 'izvajalci' => $izvajalci, 'okolisi' => $okolisi]);
    }

    public function create(Request $request) {
    	$messages = [
		    'same'    => 'Polja ":attribute" in ":other" se morata ujemati.',
		    'required' => 'Polje ":attribute" mora biti izpoljeno.',
		    'unique' => 'Uporabnik s takim ":attribute" že obstaja.',
		    'max' => 'Polje ":attribute" ima lahko največ :max številk.',
		    'email' => 'Vnešen email mora biti veljaven.'
		];

    	$customAttributes = [
    		'ime' => 'Ime',
    		'priimek' => 'Priimek',
		    'vrstauporabnika' => 'Vrsta uporabnika',
		    'sifrausluzbenca' => 'Šifra uslužbenca',
		    'sifraizvajalca' => 'Šifra izvajalca',
		    'email' => 'Email',
		    'tel_stevilka' => 'Telefonska številka',
		    'geslo' => 'Geslo',
		    'potrdigeslo' => 'Potrdi geslo'
		];

    	$this->validate($request, [
    		'ime' => 'required',
    		'priimek' => 'required',
    		'vrstauporabnika' => 'required|numeric',
        	'sifrausluzbenca' => 'required|max:5',
        	'sifraizvajalca' => 'required|max:5',
        	'email' => 'required|email|unique:uporabnik',
        	'tel_stevilka' => 'required|max:9',
        	'geslo' => 'required',
        	'potrdigeslo' => 'required|same:geslo',
    	], $messages, $customAttributes);

    	$vrstauporabnika = $request['vrstauporabnika'];

    	$uporabnik = Uporabnik::create([
    		'sifra_vloga' => $vrstauporabnika,
    		'ime' => $request['ime'],
    		'priimek' => $request['priimek'],
    		'email' => $request['email'],
    		'geslo' => bcrypt($request['geslo']),
    		'tel_stevilka' => $request['tel_stevilka'],
            'aktiviran' => true
    		]);

    	if($vrstauporabnika == 2 || $vrstauporabnika == 3) {
    		$delavec = Delavec::create([
    			'sifra_delavec' => $request['sifrausluzbenca'],
    			'sifra_zd' => $request['sifraizvajalca'],
    			'id_uporabnik' => $uporabnik->id_uporabnik
    			]);
    	} else if($vrstauporabnika == 4) {
    		$patronazna_sestra = PatronaznaSestra::create([
    				'sifra_ps' => $request['sifrausluzbenca'],
    				'sifra_zd' => $request['sifraizvajalca'],
    				'id_uporabnik' => $uporabnik->id_uporabnik,
                    'sifra_okolis' => $request['okolis']
    			]);
    	}

    	return redirect()->route('admin')->with('status', true);
    }

    public function sifranti() {
        return view('pages.sifranti');
    }
}
