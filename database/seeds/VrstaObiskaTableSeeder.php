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
                    'ime' => 'Obisk nosečnice',
                    'cena' => 65
                ],
                [
                	'sifra_vrsta_obisk' => '20',
                    'preventivni' => true,
                    'ime' => 'Obisk otročnice',
                    'cena' => 53
                ],
                [
                	'sifra_vrsta_obisk' => '40',
                    'preventivni' => true,
                    'ime' => 'Preventiva starostnika',
                    'cena' => 91
                ],
                [
                	'sifra_vrsta_obisk' => '50',
                    'preventivni' => false,
                    'ime' => 'Aplikacija injekcij',
                    'cena' => 88
                ],
                [
                	'sifra_vrsta_obisk' => '60',
                    'preventivni' => false,
                    'ime' => 'Odvzem krvi',
                    'cena' => 70
                ],
                [
                	'sifra_vrsta_obisk' => '70',
                    'preventivni' => false,
                    'ime' => 'Kontrola zdravstvenega stanja',
                    'cena' => 79
                ],
            ]);
        }
    }
}
