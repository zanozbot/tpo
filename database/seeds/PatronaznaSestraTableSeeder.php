<?php

use Illuminate\Database\Seeder;

class PatronaznaSestraTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patronazna_sestra')->delete();
        
        \DB::table('patronazna_sestra')->insert(array (
            0 => 
            array (
                'sifra_ps' => 12234,
                'sifra_okolis' => 2,
                'sifra_zd' => '05900',
                'id_uporabnik' => 9,
            ),
            1 => 
            array (
                'sifra_ps' => 45331,
                'sifra_okolis' => 3,
                'sifra_zd' => '05600',
                'id_uporabnik' => 10,
            ),
            2 => 
            array (
                'sifra_ps' => 83312,
                'sifra_okolis' => 5,
                'sifra_zd' => '06501',
                'id_uporabnik' => 11,
            ),
            3 => 
            array (
                'sifra_ps' => 21245,
                'sifra_okolis' => 11,
                'sifra_zd' => '20662',
                'id_uporabnik' => 13,
            ),
        ));
        
        
    }
}