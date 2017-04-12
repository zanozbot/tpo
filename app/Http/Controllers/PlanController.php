<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Obisk;
use App\DelovniNalog;
use App\PatronaznaSestra;

class PlanController extends Controller
{
    public function index() {
    	$sifraPlan = 0;
		if (Auth::check()) {
            if (Auth::user()->sifra_vloga == 4){
                if (session()->has('sifraPlan')){
		        	$sifraPlan = session('sifraPlan');
		        }

		        //pridobivanje šifre delavca
		        $sifraSestre = PatronaznaSestra::where('id_uporabnik', '=', Auth::user()->id_uporabnik)->get();
		        $sifraSestre = $sifraSestre[0]->sifra_ps;

				$obiski = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
									->where('opravljen', '=', 0)
									->where('sifra_plan', '!=', $sifraPlan)
									->where('sifra_ps', '=', $sifraSestre)
		                        	->get(array(
				                            'sifra_obisk',
				                            'sifra_plan',
				                            'sifra_ps',
				                            'datum_obiska',
				                            'opravljen',
				                            'nadomesca',
				                            'datum_obvezen',
				                            'sifra_bolezen'
		                        ));
		        $obiskiVPlanu = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
									->where('opravljen', '=', 0)
									->where('sifra_plan', '=', $sifraPlan)
									->where('sifra_ps', '=', $sifraSestre)
		                        	->get(array(
				                            'sifra_obisk',
				                            'sifra_plan',
				                            'sifra_ps',
				                            'datum_obiska',
				                            'opravljen',
				                            'nadomesca',
				                            'datum_obvezen',
				                            'sifra_bolezen'
		                        ));
		    	return view('pages.plan', ['obiski' => $obiski, 'obiskiVPlanu' => $obiskiVPlanu, 'sifraPlan' => $sifraPlan, 'sifraSestre' => $sifraSestre]);
            } else {
                return redirect()->route('home');
            }
        } else {
           return redirect()->route('home');
        }        
    }

    public function dodaj($sifraPlan, $sifraObiska) {
    	if (Auth::check()) {
            if (Auth::user()->sifra_vloga == 4){
                $obisk = Obisk::where('sifra_obisk', '=', $sifraObiska)->update(['sifra_plan' => $sifraPlan]);
    	
    			return redirect()->route('plan')->with('sifraPlan', $sifraPlan);
            } else {
                return redirect()->route('home');
            }
        } else {
           return redirect()->route('home');
        }     
    	
    }
}
