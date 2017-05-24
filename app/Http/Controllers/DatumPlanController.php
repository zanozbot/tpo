<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Plan;
use App\PatronaznaSestra;

class DatumPlanController extends Controller
{
    public function index() {
        if (Auth::check()) {
            if (Auth::user()->sifra_vloga == 4){
                return view('pages.datumplan');
            } else {
                return redirect()->route('home');
            }
        } else {
           return redirect()->route('home');
        }

    }

    public function create(Request $request) {

    	$messages = [
		    'required' => 'Polje ":attribute" mora biti izpolnjeno.',
		    'date_format' => 'Oblika datuma v polju ":attribute" ni pravilna.',
		    'datumPlana.after_or_equal' => 'Datum v polju ":attribute" mora biti kasnejši od danes.'
		];

    	$customAttributes = [
    		'datumPlana' => 'Datum plana'
		];

    	//preverjanje pravilnosti datuma
        $this->validate($request, [
        		'datumPlana' => 'required|date_format:d.m.Y|after_or_equal:today',
            ], $messages, $customAttributes);

        //Sprememba formata datuma
        $datumPlana = $request['datumPlana'];
       	list($dan, $mesec, $leto) = explode(".", $datumPlana);
        $datumPlana = $leto.'-'.$mesec.'-'.$dan;

        //najdi sestro
        $sifraPS = Auth::user()->id_uporabnik;
        $sifraPS = PatronaznaSestra::where('id_uporabnik', '=', $sifraPS)->value('sifra_ps');
        
        //kreiraj ali dodaj v plan
        $plan = Plan::where('datum_plan', $datumPlana)->where('sifra_ps_plan', '=', $sifraPS)->get();
        if(!$plan->first()){
            //plan v bazi še ne obstaja
            $planCreate = Plan::create([
                    'datum_plan' => $datumPlana,
                    'sifra_ps_plan' => $sifraPS
                ]);
            $sifraPlan = $planCreate->sifra_plan;
        } else {
            //plan v bazi že obstaja
            $sifraPlan = $plan[0]->sifra_plan;
        }

    	return redirect()->route('plan')->with(['sifraPlan' => $sifraPlan, 'izbraniDatum' => $request['datumPlana']]);
    }
}
