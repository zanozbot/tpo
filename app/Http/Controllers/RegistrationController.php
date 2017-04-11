<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mailer;
use App\Uporabnik;
use App\AktivacijaRacuna;
use Mail;

class RegistrationController extends Controller
{
    public function register(Request $request) {
    	// Validacija + kreacija uporabnika
    	/*$uporabnik = Uporabnik::create([

    		]);*/
    	
    	$uporabnik = Uporabnik::first(); // Izbriši
    	$aktivacija = AktivacijaRacuna::create([
    		'id_uporabnik' => $uporabnik->id_uporabnik,
    		'token' => str_random(30)
    		]);

    	Mail::to('zan.ozbot@gmail.com')->send(new Mailer($uporabnik));
    	return redirect()->route('home')->with('status', 'Poslali smo vam aktivacijsko kodo. Preverite svoj email.');
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
