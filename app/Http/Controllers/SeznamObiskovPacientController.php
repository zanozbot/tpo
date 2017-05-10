<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DelovniNalog;
use App\Uporabnik;
use App\Pacient;
use App\Obisk;
use App\PatronaznaSestra;
use App\Delavec;
use App\Plan;
use App\Porocilo;
use Auth;

class SeznamObiskovPacientController extends Controller
{

	public function index() {

		$obiskiPacienta = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
					->join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
					->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
					->join('posta', 'posta.postna_stevilka', '=', 'pacient.postna_stevilka')
        			->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        			->join('vrsta_obiska', 'delovni_nalog.sifra_vrsta_obisk', '=', 'vrsta_obiska.sifra_vrsta_obisk')
        			->join('bolezen', 'bolezen.sifra_bolezen', '=', 'delovni_nalog.sifra_bolezen')
        			->join('delavec', 'delavec.sifra_delavec', '=', 'delovni_nalog.sifra_delavec')
    				->join('izvajalec_zd', 'izvajalec_zd.sifra_zd', '=', 'delavec.sifra_zd')
    				->join('plan', 'plan.sifra_plan', '=', 'obisk.sifra_plan')
    				->where('uporabnik.id_uporabnik', '=', Auth::user()->id_uporabnik)
    				->where('opravljen', '=', 1)
        			->orderBy('obisk.sifra_obisk', 'asc')
					->get(array(
							'obisk.sifra_obisk',
							'datum_obiska as prvotni_datum_obiska',
							'datum_opravljenosti_obiska as dejanski_datum_obiska',
		                    'pacient.ime as ime_pacienta',
		                    'pacient.priimek as priimek_pacienta',
		                    'email',
		                    'tel_stevilka',
		                    'stevilka_KZZ',
		                    'pac_stevilka_KZZ',
		                    'pacient.postna_stevilka as posta_pacient',
		                    'sifra_okolis',
		                    'pacient.ulica as naslov_pacienta',
		                    'pacient.kraj as kraj_pacienta',
		                    'datum_rojstva',
		                    'spol',
		                    'delovni_nalog.sifra_dn',
		                    'vrsta_obiska.sifra_vrsta_obisk',
		                    'vrsta_obiska.ime as ime_vrsta_obiska',
		                    'stevilo_epruvet_RdMoRuZe',
		                    'datum_prvega_obiska',
		                    'datum_koncnega_obiska',
		                    'datum_obvezen',
		                    'stevilo_obiskov',
		                    'casovni_interval',
		                    'izvajalec_zd.sifra_zd',
		                    'izvajalec_zd.postna_stevilka as posta_izvajalec',
		                    'delavec.sifra_delavec as sifra_delavca',
		                    'izvajalec_zd.naziv as naziv_izvajalca',
		                    'izvajalec_zd.naslov as naslov_izvajalca',
		                    'posta.kraj as kraj_poste',
		                    'vrsta_obiska.ime as ime_vrsta_obiska',
		                    'preventivni',
		                    'bolezen.sifra_bolezen as sifra_bolezni',
		                    'bolezen.ime as ime_bolezni',
		                    'plan.sifra_plan',
		                    'plan.datum_plan as predvideni_datum_obiska'
        ));

        for ($i=0; $i < count($obiskiPacienta); $i++) {
        	$datum_obiska = Plan::where('sifra_plan', '=', $obiskiPacienta[$i]->sifra_plan)->get();
        	$obiskiPacienta[$i]->datum_obiska = $datum_obiska[0]->datum_plan;

        	$obiskiPacienta[$i]->sestra = PatronaznaSestra::join('uporabnik', 'uporabnik.id_uporabnik', '=', 'patronazna_sestra.id_uporabnik')
        										->where('sifra_okolis', '=', $obiskiPacienta[$i]->sifra_okolis)
        										->get();

        	$obiskiPacienta[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
        									->get(array(
        										'zdravilo.sifra_zdravilo as sifra_zdravila',
        										'zdravilo.ime as ime_zdravila',
        										'zdravilo.opis as opis_zdravila'
        										));

        	$obiskiPacienta[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
        									->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.pac_stevilka_KZZ')
        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        									->where('delovni_nalog.sifra_dn', '=', $obiskiPacienta[$i]->sifra_dn)
        									->where('pacient.pac_stevilka_KZZ', '=', $obiskiPacienta[$i]->stevilka_KZZ)
        									->get(array(
        										'stevilka_KZZ',
        										'pacient.ime',
        										'pacient.priimek',
        										'pacient.datum_rojstva',
        										'pac_stevilka_KZZ',
        										'pacient.ime as ime_pacienta',
        										'datum_rojstva'
        										));

       		$obiskiPacienta[$i]->porocilo = Porocilo::join('aktivnost', 'porocilo.aid', '=', 'aktivnost.aid')
       										->where('porocilo.sifra_obisk', '=', $obiskiPacienta[$i]->sifra_obisk)
       										->get();
        }


        $prijavljenPacient = Pacient::where('id_uporabnik', '=', Auth::user()->id_uporabnik)->value('stevilka_KZZ');
        $obiskiPoduporabnikov = Obisk::join('delovni_nalog', 'obisk.sifra_dn', '=', 'delovni_nalog.sifra_dn')
					->join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
					->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.stevilka_KZZ')
					->join('posta', 'posta.postna_stevilka', '=', 'pacient.postna_stevilka')
        			->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        			->join('vrsta_obiska', 'delovni_nalog.sifra_vrsta_obisk', '=', 'vrsta_obiska.sifra_vrsta_obisk')
        			->join('bolezen', 'bolezen.sifra_bolezen', '=', 'delovni_nalog.sifra_bolezen')
        			->join('delavec', 'delavec.sifra_delavec', '=', 'delovni_nalog.sifra_delavec')
    				->join('izvajalec_zd', 'izvajalec_zd.sifra_zd', '=', 'delavec.sifra_zd')
    				->join('plan', 'plan.sifra_plan', '=', 'obisk.sifra_plan')
    				->where('uporabnik.id_uporabnik', '=', Auth::user()->id_uporabnik)
    				->where('opravljen', '=', 1)
        			->orderBy('obisk.sifra_obisk', 'asc')
					->get(array(
							'obisk.sifra_obisk',
							'datum_obiska as prvotni_datum_obiska',
							'datum_opravljenosti_obiska as dejanski_datum_obiska',
		                    'pacient.ime as ime_pacienta',
		                    'pacient.priimek as priimek_pacienta',
		                    'email',
		                    'tel_stevilka',
		                    'stevilka_KZZ',
		                    'pac_stevilka_KZZ',
		                    'pacient.postna_stevilka as posta_pacient',
		                    'sifra_okolis',
		                    'pacient.ulica as naslov_pacienta',
		                    'pacient.kraj as kraj_pacienta',
		                    'datum_rojstva',
		                    'spol',
		                    'delovni_nalog.sifra_dn',
		                    'vrsta_obiska.sifra_vrsta_obisk',
		                    'vrsta_obiska.ime as ime_vrsta_obiska',
		                    'stevilo_epruvet_RdMoRuZe',
		                    'datum_prvega_obiska',
		                    'datum_koncnega_obiska',
		                    'datum_obvezen',
		                    'stevilo_obiskov',
		                    'casovni_interval',
		                    'izvajalec_zd.sifra_zd',
		                    'izvajalec_zd.postna_stevilka as posta_izvajalec',
		                    'delavec.sifra_delavec as sifra_delavca',
		                    'izvajalec_zd.naziv as naziv_izvajalca',
		                    'izvajalec_zd.naslov as naslov_izvajalca',
		                    'posta.kraj as kraj_poste',
		                    'vrsta_obiska.ime as ime_vrsta_obiska',
		                    'preventivni',
		                    'bolezen.sifra_bolezen as sifra_bolezni',
		                    'bolezen.ime as ime_bolezni',
		                    'plan.sifra_plan',
		                    'plan.datum_plan as predvideni_datum_obiska'
        ));
        for ($i=0; $i < count($obiskiPoduporabnikov); $i++) {
        	$datum_obiska = Plan::where('sifra_plan', '=', $obiskiPoduporabnikov[$i]->sifra_plan)->get();
        	$obiskiPoduporabnikov[$i]->datum_obiska = $datum_obiska[0]->datum_plan;

        	$obiskiPoduporabnikov[$i]->sestra = PatronaznaSestra::join('uporabnik', 'uporabnik.id_uporabnik', '=', 'patronazna_sestra.id_uporabnik')
        										->where('sifra_okolis', '=', $obiskiPoduporabnikov[$i]->sifra_okolis)
        										->get();

        	$obiskiPoduporabnikov[$i]->zdravila = DelovniNalog::join('delovni_nalog_zdravilo', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_zdravilo.delovni_nalog_sifra_dn')
        									->join('zdravilo', 'zdravilo.sifra_zdravilo', '=', 'delovni_nalog_zdravilo.zdravilo_sifra_zdravilo')
        									->get(array(
        										'zdravilo.sifra_zdravilo as sifra_zdravila',
        										'zdravilo.ime as ime_zdravila',
        										'zdravilo.opis as opis_zdravila'
        										));

        	$obiskiPoduporabnikov[$i]->otroci = DelovniNalog::join('delovni_nalog_pacient', 'delovni_nalog.sifra_dn', '=', 'delovni_nalog_pacient.delovni_nalog_sifra_dn')
        									->join('pacient', 'delovni_nalog_pacient.pacient_stevilka_KZZ', '=', 'pacient.pac_stevilka_KZZ')
        									->join('uporabnik', 'pacient.id_uporabnik', '=', 'uporabnik.id_uporabnik')
        									->where('delovni_nalog.sifra_dn', '=', $obiskiPoduporabnikov[$i]->sifra_dn)
        									->where('pacient.pac_stevilka_KZZ', '=', $obiskiPoduporabnikov[$i]->stevilka_KZZ)
        									->get(array(
        										'stevilka_KZZ',
        										'pacient.ime',
        										'pacient.priimek',
        										'pacient.datum_rojstva',
        										'pac_stevilka_KZZ',
        										'pacient.ime as ime_pacienta',
        										'datum_rojstva'
        										));

       		$obiskiPoduporabnikov[$i]->porocilo = Porocilo::join('aktivnost', 'porocilo.aid', '=', 'aktivnost.aid')
       										->where('porocilo.sifra_obisk', '=', $obiskiPoduporabnikov[$i]->sifra_obisk)
       										->get();
        }

		return view('pages.seznamobiskpacient', ['obiskiPacienta' => $obiskiPacienta, 'obiskiPoduporabnikov' => $obiskiPoduporabnikov]);
    }
    
}
