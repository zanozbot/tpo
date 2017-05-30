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
            'ime' => 'Zdravko',
            'priimek' => 'Zdravič',
            'email' => 'zdravko@gmail.com',
            'geslo' => bcrypt('zdravko123'),
            'tel_stevilka' => '051000002',
            'aktiviran' => true
        ]);
        $zdravnik1 = Delavec::create([
        		'sifra_zd' => '05900',
        		'sifra_delavec' => '33124',
        		'id_uporabnik' => $u1->id_uporabnik
        ]);

        $u12 = Uporabnik::create([
            'sifra_vloga' => '2',
            'ime' => 'Marko',
            'priimek' => 'Markič',
            'email' => 'marko@gmail.com',
            'geslo' => bcrypt('marko123'),
            'tel_stevilka' => '051000003',
            'aktiviran' => true
        ]);
        $zdravnik2 = Delavec::create([
                'sifra_zd' => '06501',
                'sifra_delavec' => '53424',
                'id_uporabnik' => $u12->id_uporabnik
        ]);

        $u2 = Uporabnik::create([
        	'sifra_vloga' => '3',
            'ime' => 'Vodja',
            'priimek' => 'Vodjič',
            'email' => 'vodja@gmail.com',
            'geslo' => bcrypt('vodja123'),
            'tel_stevilka' => '051000013',
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
            'ime' => 'Srečko',
            'priimek' => 'Debevc',
            'email' => 'pacient@gmail.com',
            'geslo' => bcrypt('pacient123'),
            'tel_stevilka' => '051000006',
            'aktiviran' => true
        ]);

        $pacient = Pacient::create([
        		'id_uporabnik' => $u4->id_uporabnik,
        		'stevilka_KZZ' => '1234567890',
				'ime' => 'Srečko',
				'priimek' => 'Debevc',
        		'sifra_okolis' => '3',
        		'ulica' => 'Rožna Dolina, cesta IV 45',
        		'kraj' => 'Ljubljana',
        		'datum_rojstva' => Carbon::createFromDate(1996, 5, 12, 'Europe/London'),
                'spol' => 'm',
                'postna_stevilka' => '3000'
        ]);

        $u5 = Uporabnik::create([
            'sifra_vloga' => '6',
            'ime' => 'Otrokica',
            'priimek' => 'Debevc',
            'email' => 'otrok@gmail.com',
            'geslo' => bcrypt('otrok'),
            'tel_stevilka' => '051000007',
            'aktiviran' => true
        ]);

        $pacient = Pacient::create([
            'id_uporabnik' => $u5->id_uporabnik,
            'stevilka_KZZ' => '1234567892',
            'pac_stevilka_KZZ' => '1234567890',
            'ime' => 'Otrokica',
            'priimek' => 'Debevc',
            'sifra_okolis' => '3',
            'ulica' => 'Novomeška cesta 5',
            'kraj' => 'Črna na Koroškem',
            'datum_rojstva' => Carbon::createFromDate(2016, 10, 12, 'Europe/London'),
            'spol' => 'z',
            'postna_stevilka' => '3000'
        ]);

        $u5 = Uporabnik::create([
            'sifra_vloga' => '6',
            'ime' => 'Rodilka',
            'priimek' => 'Bokmalu',
            'email' => 'rodilka@gmail.com',
            'geslo' => bcrypt('rodilka'),
            'tel_stevilka' => '051000008',
            'aktiviran' => true
        ]);

        $pacient = Pacient::create([
                'id_uporabnik' => $u5->id_uporabnik,
                'stevilka_KZZ' => '1234647123',
                'ime' => 'Rodilka',
                'priimek' => 'Bokmalu',
                'sifra_okolis' => '7',
                'ulica' => 'Koroška ulica 2',
                'kraj' => 'Koper',
                'datum_rojstva' => Carbon::createFromDate(1980, 11, 9, 'Europe/London'),
                'spol' => 'z',
                'postna_stevilka' => '6000'
        ]);

        $u5 = Uporabnik::create([
            'sifra_vloga' => '6',
            'ime' => 'Karhitro',
            'priimek' => 'Bourml',
            'email' => 'karhitro@gmail.com',
            'geslo' => bcrypt('karhitro'),
            'tel_stevilka' => '051000009',
            'aktiviran' => true
        ]);

        $pacient = Pacient::create([
                'id_uporabnik' => $u5->id_uporabnik,
                'stevilka_KZZ' => '1465567123',
                'ime' => 'Karhitro',
                'priimek' => 'Bourml',
                'sifra_okolis' => '7',
                'ulica' => 'Logaška ulica 2',
                'kraj' => 'Logatec',
                'datum_rojstva' => Carbon::createFromDate(1925, 8, 4, 'Europe/London'),
                'spol' => 'm',
                'postna_stevilka' => '1000'
        ]);

        $u6 = Uporabnik::create([
            'sifra_vloga' => '4',
            'ime' => 'Mihaela',
            'priimek' => 'Sestraričnina',
            'email' => 'mihaela@gmail.com',
            'geslo' => bcrypt('mihaela'),
            'tel_stevilka' => '051000004',
            'aktiviran' => true
        ]);
        $ps2 = PatronaznaSestra::create([
                'sifra_zd' => '12521',
                'sifra_ps' => '12345',
                'sifra_okolis' => '7',
                'id_uporabnik' => $u6->id_uporabnik
        ]);
    }
}
