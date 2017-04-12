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
            'ime' => 'Admin',
            'priimek' => 'Administratorjev',
            'email' => 'admin@gmail.com',
            'geslo' => bcrypt('admin'),
            'tel_stevilka' => '051000001',
            'aktiviran' => true
        ]);
    }
}
