<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Uporabnik;
use Illuminate\Support\Facades\Hash;

class newPasswordController extends Controller
{
    public function index(){    	
		return view('pages.newPassword');
    }

    public function change_password(Request $request) {
    	$messages = [
		    'same'    => 'Polja ":attribute" in ":other" se morata ujemati.',
		    'required' => 'Polje ":attribute" mora biti izpoljeno.',
		    'min' => 'Geslo mora biti dolgo vsaj :min znakov.',
		];

    	$customAttributes = [
    		'geslo' => 'Geslo',
		    'potrdigeslo' => 'Potrdi geslo'
		];

    	$this->validate($request, [
        	'geslo' => 'required|min:8',
        	'potrdigeslo' => 'required|same:geslo'
    	], $messages, $customAttributes);



    	$uporabnik = Auth::user();

        if (!Hash::check($request['starogeslo'], $uporabnik->geslo)) {
            return redirect()->back()->withErrors(['Napačno staro geslo.']);
        }

    	$uporabnik->geslo = bcrypt($request['geslo']);

    	Auth::logout();
    	return redirect()->route('home')->with('status', 'Geslo uspešno spremenjeno. Potrebna ponovna prijava.');
    } 
}
