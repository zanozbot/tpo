<?php

use Illuminate\Database\Seeder;

class OkolisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('okolis')->get()->count() == 0){

            DB::table('okolis')->insert([
                [
                	'sifra_okolis' => '1',
                    'ime' => 'Moste-Polje'
                ],
                [
                	'sifra_okolis' => '2',
                    'ime' => 'Polje'
                ],
                [
                	'sifra_okolis' => '3',
                    'ime' => 'Rožna dolina'
                ],
                [
                	'sifra_okolis' => '4',
                    'ime' => 'Domžale'
                ],
                [
                	'sifra_okolis' => '5',
                    'ime' => 'Vrhnika'
                ],
                [
                	'sifra_okolis' => '6',
                    'ime' => 'Logatec'
                ],
                [
                	'sifra_okolis' => '7',
                    'ime' => 'Grosuplje'
                ],
                [
                	'sifra_okolis' => '8',
                    'ime' => 'Škofja Loka'
                ],
                [
                	'sifra_okolis' => '9',
                    'ime' => 'Sežana'
                ],
                [
                	'sifra_okolis' => '10',
                    'ime' => 'Radovljica'
                ],
                [
                	'sifra_okolis' => '11',
                    'ime' => 'Ravne na Koroškem'
                ],
                [
                	'sifra_okolis' => '12',
                    'ime' => 'Slovenska bistrica'
                ]
            ]);
        }
    }
}
