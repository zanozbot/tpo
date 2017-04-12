<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obisk;
use App\DelovniNalog;

class PlanController extends Controller
{
    public function index() {
    	$sifraPlan = 0;
        if (session()->has('sifraPlan')){
        	$sifraPlan = session('sifraPlan');
        }
		$obiski = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
							->where('opravljen', '=', 0)
							->where('sifra_plan', '!=', $sifraPlan)
                        	->get(array(
		                            'sifra_obisk',
		                            'sifra_plan',
		                            'sifra_ps',
		                            'datum_obiska',
		                            'opravljen',
		                            'nadomesca',
		                            'datum_obvezen'
                        ));
        $obiskiVPlanu = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
							->where('opravljen', '=', 0)
							->where('sifra_plan', '=', $sifraPlan)
                        	->get(array(
		                            'sifra_obisk',
		                            'sifra_plan',
		                            'sifra_ps',
		                            'datum_obiska',
		                            'opravljen',
		                            'nadomesca',
		                            'datum_obvezen'
                        ));
    	return view('pages.plan', ['obiski' => $obiski, 'obiskiVPlanu' => $obiskiVPlanu, 'sifraPlan' => $sifraPlan]);
    }

    public function dodaj($sifraPlan, $sifraObiska) {
    	$obisk = Obisk::where('sifra_obisk', '=', $sifraObiska)->get();
    	$obisk = Obisk::where('sifra_obisk', '=', $sifraObiska)->update(['sifra_plan' => $sifraPlan]);
    	
    	return redirect()->route('plan')->with('sifraPlan', $sifraPlan);
    }
}
