<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VrstaObiska;
use App\Vloga;
use App\SorodstvenoRazmerje;
use App\Bolezen;
use App\Zdravilo;
use App\Meritve;
use App\IzvajalecZD;
use App\Posta;
use App\Uporabnik;

class SifrantController extends Controller
{
    public function vrste_obiskov() {
    	$vrsteObiskov = VrstaObiska::where('izbrisan', false)->get();
    	return view('pages.seznam_vrste_obiskov', ['vrsteObiskov' => $vrsteObiskov]);
    }

    public function post_vrste_obiskov(Request $request) {
		$method = $request['method'];
		switch ($method) {
				case 'posodobi':
					$vrstaObiska = VrstaObiska::find($request['sifra']);

					$vrstaObiska->ime = $request['ime'];
					$vrstaObiska->preventivni = $request['preventivni'];
					$vrstaObiska->save();
					return redirect()->back();

				case 'izbrisi':
					$vrstaObiska = VrstaObiska::find($request['sifra']);
					$vrstaObiska->izbrisan = 1;
					$vrstaObiska->save();
					return redirect()->back();

				case 'dodaj':
					if(VrstaObiska::find($request['sifra'])) {
						return redirect()->back()->with('warning', "Šifra že obstaja!");
					}
					VrstaObiska::create([
						'sifra_vrsta_obisk' => $request['sifra'],
						'ime' => $request['ime'],
						'preventivni' => $request['preventivni']
					]);
					return redirect()->back();
			}	


    	return redirect()->back();
    }

    public function vrste_uporabniskih_vlog() {
    	$vloge = Vloga::where('izbrisan', false)->get();
    	return view('pages.seznam_uporabniskih_vlog', ['vloge' => $vloge]);
    }

    public function post_vrste_uporabniskih_vlog(Request $request) {
    	$method = $request['method'];
		switch ($method) {
				case 'posodobi':
					$vloga = Vloga::find($request['sifra']);

					$vloga->ime = $request['ime'];
					$vloga->save();
					return redirect()->back();

				case 'izbrisi':
					$vloga = Vloga::find($request['sifra']);
					$vloga->izbrisan = 1;
					$vloga->save();
					return redirect()->back();

				case 'dodaj':
					if(Vloga::find($request['sifra'])) {
						return redirect()->back()->with('warning', "Šifra že obstaja!");
					}
					Vloga::create([
						'sifra_vloga' => $request['sifra'],
						'ime' => $request['ime']
					]);
					return redirect()->back();
			}	


    	return redirect()->back();
    }

    public function vrste_razmerij() {
    	$razmerja = SorodstvenoRazmerje::where('izbrisan', false)->get();
    	return view('pages.seznam_vrste_razmerij', ['razmerja' => $razmerja]);
    }

    public function post_vrste_razmerij(Request $request) {
    	$method = $request['method'];
		switch ($method) {
				case 'posodobi':
					$razmerje = SorodstvenoRazmerje::find($request['sifra']);

					$razmerje->ime = $request['ime'];
					$razmerje->save();
					return redirect()->back();

				case 'izbrisi':
					$razmerje = SorodstvenoRazmerje::find($request['sifra']);
					$razmerje->izbrisan = 1;
					$razmerje->save();
					return redirect()->back();

				case 'dodaj':
					if(SorodstvenoRazmerje::find($request['sifra'])) {
						return redirect()->back()->with('warning', "Šifra že obstaja!");
					}
					SorodstvenoRazmerje::create([
						'sifra_razmerje' => $request['sifra'],
						'ime' => $request['ime']
					]);
					return redirect()->back();
			}	


    	return redirect()->back();
    }

    public function vrste_bolezni() {
    	$bolezni = Bolezen::where('izbrisan', false)->get();
    	return view('pages.seznam_vrste_bolezni', ['bolezni' => $bolezni]);
    }

    public function post_vrste_bolezni(Request $request) {
    	$method = $request['method'];
		switch ($method) {
				case 'posodobi':
					$bolezen = Bolezen::find($request['sifra']);

					$bolezen->ime = $request['ime'];
					$bolezen->save();
					return redirect()->back();

				case 'izbrisi':
					$bolezen = Bolezen::find($request['sifra']);
					$bolezen->izbrisan = 1;
					$bolezen->save();
					return redirect()->back();

				case 'dodaj':
					if(Bolezen::find($request['sifra'])) {
						return redirect()->back()->with('warning', "Šifra že obstaja!");
					}
					Bolezen::create([
						'sifra_bolezen' => $request['sifra'],
						'ime' => $request['ime']
					]);
					return redirect()->back();
			}	


    	return redirect()->back();
    }

    public function vrste_zdravil() {
    	$zdravila = Zdravilo::where('izbrisan', false)->get();
    	return view('pages.seznam_vrste_zdravil', ['zdravila' => $zdravila]);
    }

    public function post_vrste_zdravil(Request $request) {
    	$method = $request['method'];
		switch ($method) {
				case 'posodobi':
					$zdravilo = Zdravilo::find($request['sifra']);

					$zdravilo->ime = $request['ime'];
					$zdravilo->opis = $request['opis'];
					$zdravilo->save();
					return redirect()->back();

				case 'izbrisi':
					$zdravilo = Zdravilo::find($request['sifra']);
					$zdravilo->izbrisan = 1;
					$zdravilo->save();
					return redirect()->back();

				case 'dodaj':
					if(Zdravilo::find($request['sifra'])) {
						return redirect()->back()->with('warning', "Šifra že obstaja!");
					}
					Zdravilo::create([
						'sifra_zdravilo' => $request['sifra'],
						'ime' => $request['ime'],
						'opis' => $request['opis']
					]);
					return redirect()->back();
			}	


    	return redirect()->back();
    }

    public function vrste_meritev() {
    	$meritve = Meritve::where('izbrisan', false)->get();
    	return view('pages.seznam_vrste_meritev', ['meritve' => $meritve]);
    }

    public function post_vrste_meritev(Request $request) {
    	$method = $request['method'];
		switch ($method) {
				case 'posodobi':
					$meritev = Meritve::find($request['sifra']);

					$meritev->ime = $request['ime'];
					$meritev->save();
					return redirect()->back();

				case 'izbrisi':
					$meritev = Meritve::find($request['sifra']);
					$meritev->izbrisan = 1;
					$meritev->save();
					return redirect()->back();

				case 'dodaj':
					if(Meritve::find($request['sifra'])) {
						return redirect()->back()->with('warning', "Šifra že obstaja!");
					}
					Meritve::create([
						'sifra_meritev' => $request['sifra'],
						'ime' => $request['ime']
					]);
					return redirect()->back();
			}	


    	return redirect()->back();
    }

    public function vrste_izvajalcev() {
    	$poste = Posta::all();
    	$izvajalci = IzvajalecZD::where('izbrisan', false)->get();
    	return view('pages.seznam_vrste_izvajalcev', ['izvajalci' => $izvajalci, 'poste' => $poste]);
    }

    public function post_vrste_izvajalcev(Request $request) {
    	$method = $request['method'];
		switch ($method) {
				case 'posodobi':
					$izvajalec = IzvajalecZD::find($request['sifra']);

					$izvajalec->postna_stevilka = $request['posta'];
					$izvajalec->naziv = $request['naziv'];
					$izvajalec->naslov = $request['naslov'];
					$izvajalec->save();
					return redirect()->back();

				case 'izbrisi':
					$izvajalec = IzvajalecZD::find($request['sifra']);
					$izvajalec->izbrisan = 1;
					$izvajalec->save();
					return redirect()->back();

				case 'dodaj':
					if(IzvajalecZD::find($request['sifra'])) {
						return redirect()->back()->with('warning', "Šifra že obstaja!");
					}
					IzvajalecZD::create([
						'sifra_zd' => $request['sifra'],
						'postna_stevilka' => $request['posta'],
						'naziv' => $request['naziv'],
						'naslov' => $request['naslov']
					]);
					return redirect()->back();
			}	


    	return redirect()->back();
    }

    public function uporabniki() {
    	$uporabniki = Uporabnik::whereNotIn('sifra_vloga', [1,6])->get();
    	return view('pages.seznam_uporabnikov', ['uporabniki' => $uporabniki]);
    }

    public function post_uporabniki(Request $request) {
    	$method = $request['method'];
		
		switch ($method) {
				case 'posodobi':
					$uporabnik = Uporabnik::find($request['id']);

					$uporabnik->email = $request['email'];
					$uporabnik->ime = $request['ime'];
					$uporabnik->priimek = $request['priimek'];
					$uporabnik->tel_stevilka = $request['stevilka'];
					if(strlen($request['geslo']) >= 8) {
						$uporabnik->geslo = bcrypt($request['geslo']);
					}
					$uporabnik->save();
					return redirect()->back();
			}	


    	return redirect()->back();
    }
}
