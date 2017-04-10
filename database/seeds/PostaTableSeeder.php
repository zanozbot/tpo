<?php

use Illuminate\Database\Seeder;

class PostaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('posta')->get()->count() == 0){

            DB::table('posta')->insert([
                [
                	'postna_stevilka' => '1000',
                    'kraj' => 'Ljubljana'
                ],
                [
                	'postna_stevilka' => '2000',
                    'kraj' => 'Maribor'
                ],
                [
                	'postna_stevilka' => '3000',
                    'kraj' => 'Celje'
                ],
                [
                	'postna_stevilka' => '4000',
                    'kraj' => 'Kranj'
                ],
                [
                	'postna_stevilka' => '5000',
                    'kraj' => 'Nova Gorica'
                ],
                [
                	'postna_stevilka' => '6000',
                    'kraj' => 'Koper'
                ],
                [
                	'postna_stevilka' => '8000',
                    'kraj' => 'Novo Mesto'
                ],
                [
                	'postna_stevilka' => '9000',
                    'kraj' => 'Murska Sobota'
                ]
            ]);
        }
    }
}
