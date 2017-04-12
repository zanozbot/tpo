<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Vloga;
use App\Uporabnik;
use App\PatronaznaSestra;
use App\Delavec;
use App\IzvajalecZD;
use App\ZaklepanjeIP;
use Carbon\Carbon;

class AdministratorController extends Controller
{
    public function index() {
    	$vloge = Vloga::where('sifra_vloga', '>', 1)->where('sifra_vloga', '<', 6)->get();
        $izvajalci = IzvajalecZD::all();
    	return view('pages.admin', ['vloge' => $vloge, 'izvajalci' => $izvajalci]);
    }

    public function login(Request $request){
        $userdata = array(
            'email' => $request['uporabniskoime'],
            'password' => $request['geslo']
            );

        $zaklepanjeIP = ZaklepanjeIP::firstOrCreate(['ip' => $request->ip()]);

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
                return redirect()->route('home')->with('warning', 'Vaš račun še ni bil aktiviran. Preverite svoj email.');
            }

            return $uporabnik; // Zbriši!
            //TODO: Redirect na nov pogled!
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
    		'tel_stevilka' => $request['tel_stevilka']
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
    				'id_uporabnik' => $uporabnik->id_uporabnik
    			]);
    	}

    	return redirect()->route('admin')->with('status', true);
    }
}
