<?php

use Illuminate\Database\Seeder;

class IzvajalecZDTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('izvajalec_zd')->get()->count() == 0){

            DB::table('izvajalec_zd')->insert([
                [
                	'sifra_zd' => '05900',
                    'postna_stevilka' => '1000',
                    'naziv' => 'ZDŠ LJUBLJANA',
                    'naslov' => 'AŠKRČEVA CESTA 4'
                ],
                [
                	'sifra_zd' => '06501',
                    'postna_stevilka' => '1000',
                    'naziv' => 'ŽZD LJUBLJANA',
                    'naslov' => 'CELOVŠKA CESTA 4'
                ],
                [
                	'sifra_zd' => '20662',
                    'postna_stevilka' => '2000',
                    'naziv' => 'MARIBORSKE LEKARNE MARIBOR',
                    'naslov' => 'PE LEKARNA BETNAVA'
                ],
                [
                	'sifra_zd' => '08664',
                    'postna_stevilka' => '9000',
                    'naziv' => 'SB M. SOBOTA',
                    'naslov' => 'RAKIČAN, UL DR. VRBNJAKA 6'
                ],
                [
                	'sifra_zd' => '12521',
                    'postna_stevilka' => '3000',
                    'naziv' => 'ZPIZ',
                    'naslov' => 'GREGORČIČEVA ULICA 5 A'
                ],
                [
                	'sifra_zd' => '33057',
                    'postna_stevilka' => '5000',
                    'naziv' => 'MEDIGO D.O.O. NOVA GORICA',
                    'naslov' => 'ULICA GRADNIKOVE BRIGADE 53'
                ],
                [
                	'sifra_zd' => '55218',
                    'postna_stevilka' => '6000',
                    'naziv' => 'ZAVOD FURLAN LJUBLJANA',
                    'naslov' => 'OBRTNIŠKA ULICA 30'
                ],
                [
                	'sifra_zd' => '09301',
                    'postna_stevilka' => '8000',
                    'naziv' => 'TERME KRKA, D.O.O., NOVO MESTO',
                    'naslov' => 'LJUBLJANSKA CESTA 26'
                ],
                [
                	'sifra_zd' => '17098',
                    'postna_stevilka' => '9000',
                    'naziv' => 'ZAVOD ZA ZDRAVSTVENO ZAVAROVANJE SLOVENIJE OBMOČNA ENOTA',
                    'naslov' => 'SLOVENSKA ULICA 48'
                ],
                [
                	'sifra_zd' => '05600',
                    'postna_stevilka' => '1000',
                    'naziv' => 'ZD LJUBLJANA - VIČ - RUDNIK',
                    'naslov' => 'ŠESTOVA ULICA 10'
                ]
            ]);
        }
    }
}
