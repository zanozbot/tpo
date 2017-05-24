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
use App\Nadomescanje;
use Carbon\Carbon;




class ZakljucekNadomescanjaController extends Controller
{
	public function index() {

			if (Auth::check()) {
					if (Auth::user()->sifra_vloga == 3){
						$time=Carbon::now();
						$sestre = PatronaznaSestra::get();//has('nadomescanje', '>=', 1)->get();
						foreach($sestre as $sestra) {
							$nadomescanja = Nadomescanje::where('sifra_ps',$sestra->sifra_ps)->get();
							$sestra['opravljeno']=true;
							foreach ($nadomescanja as $nadomescanje) {
								$konec=Carbon::createFromFormat('Y-m-d', $nadomescanje->konec);
								if($time->gte($konec)&&!$nadomescanje->obisk->opravljen){
									$sestra['opravljeno']=false;
								}
							}

						}
						$sestre=$sestre->where('opravljeno',false);
						return view('pages.zakljucek_nadomescanja',["sestre"=>$sestre]);
					} else {
							return redirect()->route('home');
					}
			} else {
				 return redirect()->route('home');
			}

	}

	public function end(Request $request) {
		$sifra=$request['sifra'];
		$nadomescanja=Nadomescanje::where('sifra_ps',$sifra)->get();
		$time=Carbon::now();

		$planiZaIzbris = array();
        $planiZaUpdate = array();
		foreach($nadomescanja as $nadomescanje){
			$konec=Carbon::createFromFormat('Y-m-d', $nadomescanje->konec);
			if($time->gte($konec)){
				$obisk = Obisk::where('sifra_obisk', $nadomescanje->sifra_obisk)->get();
				$trenutniPlan = Plan::where('sifra_plan', '=', $obisk[0]->sifra_plan)->get();

				$planZadolzene = Plan::where('datum_plan', '=', $trenutniPlan[0]->datum_plan)->where('sifra_ps_plan', '=', $nadomescanje->sifra_ps)->get();
                if(!count($planZadolzene)) {
                    //plan zadolžene sestre za ta datum še ne obstaja
                    Obisk::where('sifra_obisk', $nadomescanje->sifra_obisk)->update(['nadomescanje' => 0, 'sifra_nadomestne_ps' => NULL]);
                    array_push($planiZaUpdate, $trenutniPlan[0]->sifra_plan);
                } else {
                    //plan zadolžene sestre za ta datum že obstaja
                    Obisk::where('sifra_obisk', $nadomescanje->sifra_obisk)->update(['nadomescanje' => 0, 'sifra_nadomestne_ps' => NULL, 'sifra_plan' => $planZadolzene[0]->sifra_plan]);
                    array_push($planiZaIzbris, Plan::where('datum_plan', '=', $trenutniPlan[0]->datum_plan)->where('sifra_ps_plan', '=', $nadomescanje->sifra_nadomestne_ps)->value('sifra_plan'));
                }
	
				$nadomescanje->delete();
			}
		}

		foreach ($planiZaIzbris as $p){
            $plan = Plan::where('sifra_plan', '=', $p)->delete();
        }
        foreach ($planiZaUpdate as $p){
            Plan::where('sifra_plan', '=', $p)->update(['sifra_ps_plan' => $nadomescanja[0]->sifra_ps]);
        }
		return redirect()->route('zakljucek_nadomescanja')->with('status', 'Obiski so bili uspešno dodeljeni prvotni sestri.');

	}

}
