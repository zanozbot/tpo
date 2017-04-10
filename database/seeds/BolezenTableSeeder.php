<?php

use Illuminate\Database\Seeder;

class BolezenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('bolezen')->get()->count() == 0){

            DB::table('bolezen')->insert([
                [
                	'sifra_bolezen' => 'A00',
                    'ime' => 'Kolera'
                ],
                [
                	'sifra_bolezen' => 'A17',
                    'ime' => 'Tuberkuloza živčevja'
                ],
                [
                	'sifra_bolezen' => 'A20',
                    'ime' => 'Kuga'
                ],
                [
                	'sifra_bolezen' => 'A30',
                    'ime' => 'Gobavost'
                ],
                [
                	'sifra_bolezen' => 'A37',
                    'ime' => 'Oslovski kašelj'
                ],
                [
                	'sifra_bolezen' => 'E28',
                    'ime' => 'Disfunkcija jajčnika'
                ],
                [
                	'sifra_bolezen' => 'E30.0',
                    'ime' => 'Zapoznela puberteta'
                ],
                [
                	'sifra_bolezen' => 'E66',
                    'ime' => 'Debelost'
                ],
                [
                	'sifra_bolezen' => 'H40',
                    'ime' => 'Glavkom (zelena mrena)'
                ],
                [
                	'sifra_bolezen' => 'H53.8',
                    'ime' => 'Nočna slepota'
                ],
                [
                	'sifra_bolezen' => 'L68',
                    'ime' => 'Hipertrihoza (prekomerna poraščenost)'
                ],
                [
                	'sifra_bolezen' => 'N92',
                    'ime' => 'Premočna, prepogosta in neredna menstruacija'
                ],
                [
                	'sifra_bolezen' => 'S40',
                    'ime' => 'Površinska poškodba rame in nadlakti'
                ],
                [
                	'sifra_bolezen' => 'S43.0',
                    'ime' => 'Izpah ramenskega sklepa'
                ]
            ]);
        }
    }
}
