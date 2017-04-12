<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Uporabnik;

class AdministratorUporabnikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    	 Uporabnik::create([
        	'sifra_vloga' => '1',
            'ime' => 'Žan',
            'priimek' => 'Ožbot',
            'email' => 'zan.ozbot@gmail.com',
            'geslo' => bcrypt('admin'),
            'tel_stevilka' => '051700106'
        ]);
    }
}
