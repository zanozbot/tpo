<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pacient;
use App\Uporabnik;
use Illuminate\Support\Facades\Hash;

class OdstraniRacunController extends Controller
{
    public function index(){
    if(Auth::user()->sifra_vloga != 6){
      return redirect()->route('home');
    }
		return view('pages.odstraniRacun');
    }

    public function delete_account(Request $request) {
    	$messages = [
		    'required' => 'Polje ":attribute" mora biti izpoljeno.',
		];

    	$customAttributes = [
    		'geslo' => 'Geslo',
		];

    	$this->validate($request, [
        	'geslo' => 'required',
    	], $messages, $customAttributes);

    	$uporabnik = Auth::user();

      if($uporabnik->sifra_vloga != 6){
        return redirect()->route('home');
      }

      if (!Hash::check($request['geslo'], $uporabnik->geslo)) {
          return redirect()->back()->withErrors(['Napačno geslo.']);
      }
      $glavniKZZ=Pacient::where('id_uporabnik',$uporabnik->id_uporabnik)->first()->stevilka_KZZ;
      $poduporabniki=Pacient::where('pac_stevilka_KZZ',$glavniKZZ)->get();
      if($poduporabniki){
        foreach($poduporabniki as $poduporabnik){
          $poduporabnik->uporabnik->izbrisan=true;
          $poduporabnik->uporabnik->save();
        }
      }
    	$uporabnik->geslo = NULL;
      $uporabnik->email = NULL;
      $uporabnik->tel_stevilka = NULL;
      $uporabnik->izbrisan = true;
      $uporabnik->save();

    	Auth::logout();
    	return redirect()->route('home')->with('status', 'Račun uspešno odstranjen');
    }
}
