<?php

use Illuminate\Database\Seeder;

class MeritveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('meritve')->get()->count() == 0){

            DB::table('meritve')->insert([
                [
                	'sifra_meritev' => 'TETEZ',
                    'ime' => 'Telesna teža'
                ],
                [
                	'sifra_meritev' => 'DIHAN',
                    'ime' => 'Dihanje'
                ],
                [
                	'sifra_meritev' => 'TETEM',
                    'ime' => 'Telesna temperatura'
                ],
                [
                	'sifra_meritev' => 'DAROJ',
                    'ime' => 'Datum rojstva'
                ],
                [
                	'sifra_meritev' => 'POTEO',
                    'ime' => 'Porodna teža otroka'
                ],
                [
                	'sifra_meritev' => 'POVIO',
                    'ime' => 'Porodna višina otroka'
                ],
                [
                	'sifra_meritev' => 'KRPRI',
                    'ime' => 'Krvni pritisk'
                ],
                [
                	'sifra_meritev' => 'SRUTR',
                    'ime' => 'Srčni utrip'
                ],
                [
                	'sifra_meritev' => 'RISPA',
                    'ime' => 'Ritem spanja'
                ],
                [
                	'sifra_meritev' => 'KRSLA',
                    'ime' => 'Krvni sladkor'
                ]
            ]);
        }
    }
}
