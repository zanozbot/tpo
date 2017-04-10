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
                    'ime' => 'Pomurska regija'
                ],
                [
                	'sifra_okolis' => '2',
                    'ime' => 'Podravska regija'
                ],
                [
                	'sifra_okolis' => '3',
                    'ime' => 'Koroška regija'
                ],
                [
                	'sifra_okolis' => '4',
                    'ime' => 'Savinjska regija'
                ],
                [
                	'sifra_okolis' => '5',
                    'ime' => 'Zasavska regija'
                ],
                [
                	'sifra_okolis' => '6',
                    'ime' => 'Posavska regija'
                ],
                [
                	'sifra_okolis' => '7',
                    'ime' => 'Jugovzhodna Slovenija'
                ],
                [
                	'sifra_okolis' => '8',
                    'ime' => 'Osrednjeslovenska regija'
                ],
                [
                	'sifra_okolis' => '9',
                    'ime' => 'Gorenjska regija'
                ],
                [
                	'sifra_okolis' => '10',
                    'ime' => 'Primorsko-notranjska regija'
                ],
                [
                	'sifra_okolis' => '11',
                    'ime' => 'Goriška regija'
                ],
                [
                	'sifra_okolis' => '12',
                    'ime' => 'Obalno-kraška regija'
                ]
            ]);
        }
    }
}
