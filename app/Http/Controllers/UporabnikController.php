<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZaklepanjeIP;
use App\PozabljenoGeslo;
use App\Uporabnik;
use Carbon\Carbon;
use Auth;
use Mail;
use App\Mail\PozabljenoGesloEmail;

class UporabnikController extends Controller
{
    public function login(Request $request){
        $userdata = array(
            'email' => $request['uporabniskoime'],
            'password' => $request['geslo']
            );

        $ip = null;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $zaklepanjeIP = ZaklepanjeIP::firstOrCreate(['ip' => $ip]);

        $minutesPassed = Carbon::now()->diffInMinutes($zaklepanjeIP->updated_at);

        if($zaklepanjeIP->poskus >= 3) {
            if($minutesPassed > 1) {
                $this->resetirajPoskuse($zaklepanjeIP);
            }else {
                return redirect()->route('home')->with('danger', 'Zaradi 3 napačnih poskusov smo vam onemogočili prijavo za 2 minuti.');
            }
        }

        if(Auth::attempt($userdata)){
            $this->resetirajPoskuse($zaklepanjeIP);
            $uporabnik = Auth::user();
            $uporabnik->datum_prijave = Carbon::now();
            $uporabnik->save();

            if(!$uporabnik->aktiviran) {
                Auth::logout();
                return redirect()->route('prijava')->with('warning', 'Vaš račun še ni bil aktiviran. Preverite svoj email.');
            }

            //return $uporabnik; // Zbriši!
            return redirect()->route('home');
        } else {
            $zaklepanjeIP->poskus += 1;
            $zaklepanjeIP->save();
            return redirect()->route('prijava')->with('warning', 'Napačno uporabniško ime ali geslo.');
        }
    }

    private function resetirajPoskuse(ZaklepanjeIP $zaklepanjeIP) {
        $zaklepanjeIP->poskus = 0;
        $zaklepanjeIP->save();
    }

    public function logout() {
    	Auth::logout();
    	return redirect()->route('home');
    }

    public function pozabljenoGeslo() {
        return view('pages.pozabljeno_geslo');
    }

    public function pozabljenoGesloPost(Request $request) {
        $messages = [
            'same'    => 'Polja ":attribute" in ":other" se morata ujemati.',
            'required' => 'Polje ":attribute" mora biti izpoljeno.',
            'exists' => 'Uporabnik s takim ":attribute" ne obstaja.',
            'email' => 'Vnešen email mora biti veljaven.'
        ];

        $customAttributes = [
            'email' => 'Email',
            'geslo' => 'Geslo',
            'potrdigeslo' => 'Potrdi geslo'
        ];

        $this->validate($request, [
            'email' => 'required|email|exists:uporabnik',
            'geslo' => 'required',
            'potrdigeslo' => 'required|same:geslo',
        ], $messages, $customAttributes);


        $uporabnik = Uporabnik::where('email', $request['email'])->first();

        $pozabljeno_geslo = PozabljenoGeslo::create([
            'geslo' => $request['geslo'],
            'id_uporabnik' => $uporabnik->id_uporabnik,
            'token' => str_random(30)
        ]);

        Mail::to($uporabnik->email)->send(new PozabljenoGesloEmail($uporabnik));

        return redirect()->route('login')->with('status', 'Na vaš email je bila poslana potrditvena povezava za novo geslo.');
    }

    public function confirm_password($token) {
        $pozabljeno_geslo = PozabljenoGeslo::find($token);
        if($pozabljeno_geslo->dirty) {
            return redirect()->route('login')->with('warning', 'Geslo je bilo že aktivirano.');
        }
        $uporabnik = $pozabljeno_geslo->uporabnik;

        $pozabljeno_geslo->dirty = true;
        $pozabljeno_geslo->save();

        $uporabnik->geslo = bcrypt($pozabljeno_geslo->geslo);
        $uporabnik->save();

        return redirect()->route('login')->with('status', 'Uspešna aktivacija novega gesla.');
    }
}
