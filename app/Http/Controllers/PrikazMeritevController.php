<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacient;
use App\Obisk;
use App\DelovniNalog;
use Carbon\Carbon;
use Auth;

class PrikazMeritevController extends Controller
{

    public function izberi_meritev() {
    	if(Auth::user()->vloga->sifra_vloga == 6) {
    		$delovniNalogi = Auth::user()->pacient->first()->delovni_nalog;
   			$poduporabniki = Auth::user()->pacient->first()->skrbi_za;

   			foreach ($poduporabniki as $poduporabnik) {
   				$delovniNalogi = $delovniNalogi->merge($poduporabnik->delovni_nalog);
   			}

    	} else {
    		$delovniNalogi = DelovniNalog::all();
    	}
    	return view('pages.doloci_meritve', ['delovniNalogi' => $delovniNalogi]);
    }

    public function post_izberi_meritev(Request $request) {
    	$messages = [
		    'after' => 'Končni datum mora biti večji od začetnega datuma.',
		];

    	$this->validate($request, [
		    'datumZacetek' => 'required|date',
		    'datumKonec' => 'required|date|after:datumZacetek'
		], $messages, []);

		$delovniNalog = DelovniNalog::find($request['delovniNalog']);
		$obiski = $delovniNalog->obisk->where('opravljen', true);

		$zacetek = Carbon::createFromFormat('d.m.Y', $request['datumZacetek']);
		$konec = Carbon::createFromFormat('d.m.Y', $request['datumKonec']);

		$sistolicni = [];
    	$diastolicni = [];
    	$datum = [];

    	foreach ($obiski as $obisk) {
    		if(Carbon::createFromFormat('Y-m-d', $obisk->datum_opravljenosti_obiska)->between($zacetek, $konec)) {
    			$json = json_decode($obisk->porocilo->where('aid', 19)->first()->opis);
				array_push($sistolicni, $json->{'sis'});
				array_push($diastolicni, $json->{'dia'});
				array_push($datum, Carbon::parse($obisk->datum_opravljenosti_obiska)->format('d.m.Y'));
    		}    		
    	}
    	return view('pages.prikaz_meritev', [
    		'sistolicni' => $sistolicni, 
    		'diastolicni' => $diastolicni, 
    		'datum' => $datum,
    		'delovniNalog' => $delovniNalog
    		]);
    }
}
