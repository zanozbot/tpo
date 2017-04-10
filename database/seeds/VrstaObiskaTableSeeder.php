<?php

use Illuminate\Database\Seeder;

class VrstaObiskaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('vrsta_obiska')->get()->count() == 0){

            DB::table('vrsta_obiska')->insert([
                [
                	'sifra_vrsta_obisk' => '10',
                    'preventivni' => true,
                    'ime' => 'Obisk nosečnice'
                ],
                [
                	'sifra_vrsta_obisk' => '20',
                    'preventivni' => true,
                    'ime' => 'Obisk otročnice'
                ],
                [
                	'sifra_vrsta_obisk' => '40',
                    'preventivni' => true,
                    'ime' => 'Preventiva starostnika'
                ],
                [
                	'sifra_vrsta_obisk' => '50',
                    'preventivni' => false,
                    'ime' => 'Aplikacija injekcij'
                ],
                [
                	'sifra_vrsta_obisk' => '60',
                    'preventivni' => false,
                    'ime' => 'Odvzem krvi'
                ],
                [
                	'sifra_vrsta_obisk' => '70',
                    'preventivni' => false,
                    'ime' => 'Kontrola zdravstvenega stanja'
                ],
            ]);
        }
    }
}
