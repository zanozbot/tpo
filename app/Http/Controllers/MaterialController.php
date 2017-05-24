<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Obisk;
use App\Uporabnik;
use App\Pacient;
use App\DelovniNalog;
use App\PatronaznaSestra;
use App\Delavec;
use App\Aktivnost;
use App\Porocilo;
use App\Plan;
use App\Zdravilo;
use Carbon\Carbon;


class MaterialController extends Controller
{
	public function index() {
			if (Auth::check()) {
					if (Auth::user()->sifra_vloga == 4){
							return view('pages.material');
					} else {
							return redirect()->route('home');
					}
			} else {
				 return redirect()->route('home');
			}

	}

	public function show(Request $request) {
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

			$plan = Plan::where('datum_plan', $datumPlana)->where('sifra_ps_plan', '=', $sifraPS)->get();
	
			//Preveri če je takrat že plan
			if($plan->first()){
					$sifraPlan = Plan::where('datum_plan', '=', $datumPlana)->where('sifra_ps_plan', '=', $sifraPS)->get();
					$sifraPlan = $sifraPlan[0]->sifra_plan;
					$obiski = Obisk::where('sifra_plan', $sifraPlan)
									->where('opravljen', '=', 0)->get();
					$stzdravila=Zdravilo::get();
					foreach ($stzdravila as $zdravilo) {
							$zdravilo['kolicina'] = 0;
					}
					$epruvete=collect(['rd'=>0, 'mo'=>0, 'ru'=>0, 'ze'=>0]);
					foreach($obiski as $obisk){
						$nalog = DelovniNalog::find($obisk->sifra_dn);
						$zdravila = $nalog->zdravilo;
						
						foreach ($zdravila as $zdravilo) {
							$stzdravila->where('sifra_zdravilo',$zdravilo->sifra_zdravilo)->first()->kolicina+=1;
						}

						$steviloEpruvet= $nalog->stevilo_epruvet_RdMoRuZe;
						$steviloEpruvet = explode(' ', $steviloEpruvet);
						$epruvete['rd']+=$steviloEpruvet[0];
						$epruvete['mo']+=$steviloEpruvet[1];
						$epruvete['ru']+=$steviloEpruvet[2];
						$epruvete['ze']+=$steviloEpruvet[3];
					}

					return view('pages.material', ['epruvete' => $epruvete, 'zdravila' => $stzdravila]);
			}
			else
			{
				return view('pages.material')->withErrors('Plan za ta dan ne obstaja');;
			}

	}

}
