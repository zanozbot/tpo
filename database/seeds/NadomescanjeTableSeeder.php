<?php

use Illuminate\Database\Seeder;
use App\Obisk;
use App\Nadomescanje;
use App\DelovniNalog;
use App\Plan;
use App\Pacient;


class NadomescanjeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$delovni_nalog = DelovniNalog::create([
    		'sifra_delavec' => '33124',
            'sifra_bolezen' => 'A00',
            'sifra_vrsta_obisk' => 10,
            'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
            'datum_prvega_obiska' => '2017-05-09',
            'datum_obvezen' => false,
            'stevilo_obiskov' => 1,
            'casovni_interval' => 2
    	]);

        $pacient = Pacient::find(1234567890);
        $pacient->delovni_nalog()->attach(1);

        $plan = Plan::create([
            'sifra_plan' => 1,
            'datum_plan' => '2017-05-10'
        ]);

        $obisk = Obisk::create([
        	'sifra_dn' => $delovni_nalog->sifra_dn,
        	'sifra_plan' => $plan->sifra_plan,
        	'originalna_sifra_plan' => -1,
        	'sifra_ps' => '20142',
        	'datum_obiska' => '2017-05-10'
        ]);

        Obisk::create([
            'sifra_dn' => $delovni_nalog->sifra_dn,
            'sifra_plan' => $plan->sifra_plan,
            'originalna_sifra_plan' => -1,
            'sifra_ps' => '20142',
            'datum_obiska' => '2017-05-10',
            'opravljen' => 1,
            'datum_opravljenosti_obiska' => '2017-05-10'
        ]);

        Nadomescanje::create([
        	'sifra_ps' => '20142',
        	'sifra_obisk' => $obisk->sifra_obisk,
        	'zacetek' => '2017-05-06',
        	'konec' => '2017-05-10',
        	'nadomestna_sifra_ps' => '12345'
        ]);
    }
}
