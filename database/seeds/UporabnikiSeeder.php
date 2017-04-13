<?php

use Illuminate\Database\Seeder;
use App\Uporabnik;
use App\PatronaznaSestra;
use App\Pacient;
use App\Delavec;
use Carbon\Carbon;

class UporabnikiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = Uporabnik::create([
        	'sifra_vloga' => '2',
            'ime' => 'Zdravnik',
            'priimek' => 'Zdravniški',
            'email' => 'zdravnik@gmail.com',
            'geslo' => bcrypt('zdravnik'),
            'tel_stevilka' => '051000002',
            'aktiviran' => true
        ]);
        $zdravnik = Delavec::create([
        		'sifra_zd' => '05900',
        		'sifra_delavec' => '33124',
        		'id_uporabnik' => $u1->id_uporabnik
        ]);

        $u2 = Uporabnik::create([
        	'sifra_vloga' => '3',
            'ime' => 'Vodja',
            'priimek' => 'Patronaženski',
            'email' => 'vodja@gmail.com',
            'geslo' => bcrypt('vodja'),
            'tel_stevilka' => '051000003',
            'aktiviran' => true
        ]);
        $vodjaps = Delavec::create([
        		'sifra_zd' => '06501',
        		'sifra_delavec' => '55641',
        		'id_uporabnik' => $u2->id_uporabnik
        ]);

        $u3 = Uporabnik::create([
        	'sifra_vloga' => '4',
            'ime' => 'Sestra',
            'priimek' => 'Patronaženski',
            'email' => 'sestra@gmail.com',
            'geslo' => bcrypt('sestra'),
            'tel_stevilka' => '051000004',
            'aktiviran' => true
        ]);
        $ps = PatronaznaSestra::create([
        		'sifra_zd' => '12521',
        		'sifra_ps' => '20142',
        		'sifra_okolis' => '3',
        		'id_uporabnik' => $u3->id_uporabnik
        ]);

        $u4 = Uporabnik::create([
        	'sifra_vloga' => '6',
            'ime' => 'Pacient',
            'priimek' => 'Debevc',
            'email' => 'pacient@gmail.com',
            'geslo' => bcrypt('pacient'),
            'tel_stevilka' => '051000006',
            'aktiviran' => true
        ]);
        $pacient = Pacient::create([
        		'id_uporabnik' => $u4->id_uporabnik,
        		'stevilka_KZZ' => '1234567890',
				'ime' => 'Pacient',
				'priimek' => 'Debevc',
        		'sifra_okolis' => '3',
        		'ulica' => 'Novomeška cesta 5',
        		'kraj' => 'Črna na Koroškem',
        		'datum_rojstva' => Carbon::createFromDate(1996, 5, 12, 'Europe/London'),
                'spol' => 'm',
                'postna_stevilka' => '3000'
        ]);
    }
}
