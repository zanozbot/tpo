<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZaklepanjeIP;
use Carbon\Carbon;
use Auth;

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
                return redirect()->route('home')->with('warning', 'Vaš račun še ni bil aktiviran. Preverite svoj email.');
            }

            //return $uporabnik; // Zbriši!
            return redirect()->route('home');
        } else {
            $zaklepanjeIP->poskus += 1;
            $zaklepanjeIP->save();
            return redirect()->route('home')->with('warning', 'Napačno uporabniško ime ali geslo.');
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
}
