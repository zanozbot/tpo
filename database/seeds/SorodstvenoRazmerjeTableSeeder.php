<?php

use Illuminate\Database\Seeder;

class SorodstvenoRazmerjeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('sorodstveno_razmerje')->get()->count() == 0){

            DB::table('sorodstveno_razmerje')->insert([
                [
                	'sifra_razmerje' => 'A1',
                    'ime' => 'Otrok do 18. leta starosti'
                ],
                [
                	'sifra_razmerje' => 'A2',
                    'ime' => 'Otrok med 18. in 26. letom, ki nadaljuje šolanje'
                ],
                [
                	'sifra_razmerje' => 'B',
                    'ime' => 'Zakonec ali zunajzakonski partner'
                ],
                [
                	'sifra_razmerje' => 'C',
                    'ime' => 'Stari starš'
                ]
            ]);
        }
    }
}
