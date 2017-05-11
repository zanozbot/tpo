<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nadomescanje;
use App\PatronaznaSestra;
use App\Obisk;
use Carbon\Carbon;

class NadomescanjeController extends Controller
{
    public function index() {
    	return view('pages.dolocitev_nadomescanja')->with('sestre', PatronaznaSestra::all());
    	/*$nadomescanje = Nadomescanje::create([
    		'sifra_ps' => 20142,
    		'nadomestna_sifra_ps' => 12345,
    		'sifra_obisk' => 1,
    		'konec' => Carbon::now(),
    		'zacetek' => Carbon::now()
    	]);

    	echo $nadomescanje->patronazna_sestra;
    	echo $nadomescanje->nadomestna_patronazna_sestra;
    	echo $nadomescanje->obisk;*/
    }

    public function nastaviNadomescanje(Request $request) {
    	$messages = [
            'required' => 'Polje ":attribute" mora biti izpoljeno.',
            'after' => 'Polje :attribute mora vsebovati datum po Začetni datum.'
        ];

        $customAttributes = [
            'sifra_ps' => 'Patronažna Sestra',
            'nadomestna_sifra_ps' => 'Nadomestna patronažna Sestra',
            'konec' => 'Končni datum',
            'zacetek' => 'Začetni datum'
        ];

        $this->validate($request, [
            'sifra_ps' => 'required',
            'nadomestna_sifra_ps' => 'required',
            'zacetek' => 'required|date',
            'konec' => 'required|date|after:zacetek',
        ], $messages, $customAttributes);

        $ps = PatronaznaSestra::find($request['sifra_ps']);
        $nadomestna_ps = PatronaznaSestra::find($request['nadomestna_sifra_ps']);
        $obiski = $ps->obisk;

		$zacetek = Carbon::createFromFormat('d.m.Y', $request['zacetek']);
		$konec = Carbon::createFromFormat('d.m.Y', $request['konec']);
		foreach ($obiski as $obisk) {
			$datum = Carbon::createFromFormat('Y-m-d', $obisk->datum_obiska);
			if($datum->between($zacetek, $konec, true)) {
				Nadomescanje::create([
					'sifra_ps' => $ps->sifra_ps,
					'nadomestna_sifra_ps' => $nadomestna_ps->sifra_ps,
					'zacetek' => $zacetek,//$request['zacetek'],
					'konec' => $konec,//$request['konec'],
					'sifra_obisk' => $obisk->sifra_obisk
				]);
				$obisk->sifra_ps = $nadomestna_ps->sifra_ps;
				$obisk->save();

			}
		}
        return redirect()->route('dolocitev_nadomescanja')->with('status', 'Uspeh.');
    }
}
