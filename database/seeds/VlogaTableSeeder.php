<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VlogaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
         // check if table users is empty
        if(DB::table('vloga')->get()->count() == 0){

            DB::table('vloga')->insert([
                [
                	'sifra_vloga' => '1',
                    'ime' => 'Administrator'
                ],
                [
                	'sifra_vloga' => '2',
                    'ime' => 'Zdravnik'
                ],
                [
                    'sifra_vloga' => '3',
                    'ime' => 'Vodja patronažne službe'
                ],
                [
                    'sifra_vloga' => '4',
                    'ime' => 'Patronažna sestra'
                ],
                [
                    'sifra_vloga' => '5',
                    'ime' => 'Pacient'
                ]
            ]);
        }

    }
}
