<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class DatumPlanController extends Controller
{
    public function index() {
    	return view('pages.datumplan');
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
        		'datumPlana' => 'required|date_format:d/m/Y|after_or_equal:tomorrow',
            ], $messages, $customAttributes);

        //Sprememba formata datuma
        $datumPlana = $request['datumPlana'];
       	list($dan, $mesec, $leto) = explode("/", $datumPlana);
        $datumPlana = $leto.'-'.$mesec.'-'.$dan;

        //kreiraj ali dodaj v plan
        $plan = Plan::where('datum_plan', $datumPlana)->get();
        if(!$plan->first()){
            //plan v bazi še ne obstaja
            $planCreate = Plan::create([
                    'datum_plan' => $datumPlana
                ]);
            $sifraPlan = Plan::max('sifra_plan');
        } else {
            //plan v bazi že obstaja
            $sifraPlan = Plan::where('datum_plan', '=', $datumPlana)->get();
            $sifraPlan = $sifraPlan[0]->sifra_plan;
        }

    	return redirect()->route('plan')->with('sifraPlan', $sifraPlan);
    }
}
