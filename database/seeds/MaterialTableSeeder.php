<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('material')->get()->count() == 0){

            DB::table('material')->insert([
                [
                	'sifra_material' => '1',
                    'ime' => 'Rdeča epruveta'
                ],
                [
                	'sifra_material' => '2',
                    'ime' => 'Modra epruveta'
                ],
                [
                	'sifra_material' => '3',
                    'ime' => 'Rumena epruveta'
                ],
                [
                	'sifra_material' => '4',
                    'ime' => 'Zelena epruveta'
                ],
                [
                	'sifra_material' => '5',
                    'ime' => 'Injekcija'
                ],
                [
                	'sifra_material' => '6',
                    'ime' => 'Elastični povoj'
                ],
                [
                	'sifra_material' => '7',
                    'ime' => 'Fiziološka raztopina'
                ],
                [
                	'sifra_material' => '8',
                    'ime' => 'Sterilne rokavice'
                ]
            ]);
        }
    }
}
