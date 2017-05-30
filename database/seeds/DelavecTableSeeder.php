<?php

use Illuminate\Database\Seeder;

class DelavecTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delavec')->delete();
        
        \DB::table('delavec')->insert(array (
            0 => 
            array (
                'sifra_delavec' => 33124,
                'sifra_zd' => '05900',
                'id_uporabnik' => 2,
            ),
            1 => 
            array (
                'sifra_delavec' => 53424,
                'sifra_zd' => '06501',
                'id_uporabnik' => 3,
            ),
            2 => 
            array (
                'sifra_delavec' => 55641,
                'sifra_zd' => '06501',
                'id_uporabnik' => 4,
            ),
        ));
        
        
    }
}