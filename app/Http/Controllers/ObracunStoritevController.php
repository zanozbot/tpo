<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\VrstaObiska;
use App\Zdravilo;
use App\Plan;
use App\Obisk;
use App\DelovniNalog;

class ObracunStoritevController extends Controller
{
	public function index() {
    	return view('pages.obracunStoritev');
    }

    public function post_obracun_storitev(Request $request) {
    	$messages = [
		    'after' => 'Končni datum mora biti večji od začetnega datuma.',
		];

    	$this->validate($request, [
		    'datumZacetek' => 'required|date',
		    'datumKonec' => 'required|date|after:datumZacetek'
		], $messages, []);

    	$zacetek = $request['datumZacetek'];
       	list($dan, $mesec, $leto) = explode(".", $zacetek);
        $zacetek = $leto.'-'.$mesec.'-'.$dan;

        $konec = $request['datumKonec'];
       	list($dan, $mesec, $leto) = explode(".", $konec);
        $konec = $leto.'-'.$mesec.'-'.$dan;

		$stVsehObiskov_vrstaObiska = 0;
		$skupniStroskiObiskov_vrstaObiska = 0;
		$skupniStroski_vsi = 0;
		$vrsteObiskov = VrstaObiska::all();
		foreach ($vrsteObiskov as $vrstaObiska) {
			$plani = Plan::join('obisk', 'obisk.sifra_plan', 'plan.sifra_plan')
						->join('delovni_nalog', 'delovni_nalog.sifra_dn', 'obisk.sifra_dn')
						->where('sifra_vrsta_obisk', $vrstaObiska->sifra_vrsta_obisk)
						->where('datum_plan', '>=', $zacetek)
						->where('datum_plan', '<=', $konec)
						->get();

			$vrstaObiska->st_obiskov = count($plani);
			$vrstaObiska->stroski = $vrstaObiska->st_obiskov*$vrstaObiska->cena;
			$stVsehObiskov_vrstaObiska = $stVsehObiskov_vrstaObiska + $vrstaObiska->st_obiskov;
			$skupniStroskiObiskov_vrstaObiska = $skupniStroskiObiskov_vrstaObiska + $vrstaObiska->stroski;
			$skupniStroski_vsi = $skupniStroski_vsi + $vrstaObiska->stroski;
		}

		$stVsehObiskov_zdravilo = 0;
		$skupniStroskiObiskov_zdravilo = 0;
		$zdravila = Zdravilo::all();
		foreach ($zdravila as $zdravilo) {
			$plani = Plan::join('obisk', 'obisk.sifra_plan', 'plan.sifra_plan')
						->join('delovni_nalog', 'delovni_nalog.sifra_dn', 'obisk.sifra_dn')
						->join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
						->where('zdravilo_sifra_zdravilo', $zdravilo->sifra_zdravilo)
						->where('datum_plan', '>=', $zacetek)
						->where('datum_plan', '<=', $konec)
						->get();

			$zdravilo->st_obiskov = count($plani);
			$zdravilo->stroski = $zdravilo->st_obiskov*$zdravilo->cena;
			$stVsehObiskov_zdravilo = $stVsehObiskov_zdravilo + $zdravilo->st_obiskov;
			$skupniStroskiObiskov_zdravilo = $skupniStroskiObiskov_zdravilo + $zdravilo->stroski;
			$skupniStroski_vsi = $skupniStroski_vsi + $zdravilo->stroski;
		}

    	return view('pages.prikaz_obracun', ['datumZacetek' => $request['datumZacetek'],
    										 'datumKonec' => $request['datumKonec'],
    										 'vrsteObiskov' => $vrsteObiskov,
    										 'zdravila' => $zdravila,
    										 'stVsehObiskov_vrstaObiska' => $stVsehObiskov_vrstaObiska,
    										 'skupniStroskiObiskov_vrstaObiska' => $skupniStroskiObiskov_vrstaObiska,
    										 'stVsehObiskov_zdravilo' => $stVsehObiskov_zdravilo,
    										 'skupniStroskiObiskov_zdravilo' => $skupniStroskiObiskov_zdravilo,
    										 'skupniStroski_vsi' => $skupniStroski_vsi
    										]);
    }
}
