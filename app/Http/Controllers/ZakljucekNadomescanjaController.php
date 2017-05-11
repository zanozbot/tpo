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
		foreach($nadomescanja as $nadomescanje){
			$konec=Carbon::createFromFormat('Y-m-d', $nadomescanje->konec);
			if($time->gte($konec)){
				$nadomescanje->obisk->sifra_ps=$sifra;
				$nadomescanje->obisk->nadomesca = false;
				$nadomescanje->delete();
			}
		}
		return redirect()->route('zakljucek_nadomescanja');

	}

}
