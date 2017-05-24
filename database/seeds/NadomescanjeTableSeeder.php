<?php

use Illuminate\Database\Seeder;

class NadomescanjeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nadomescanje')->delete();
        
        \DB::table('nadomescanje')->insert(array (
            0 => 
            array (
                'nid' => 1,
                'zacetek' => '2017-05-25',
                'konec' => '2017-05-29',
                'sifra_ps' => 12345,
                'nadomestna_sifra_ps' => 20142,
                'sifra_obisk' => 1,
            ),
            1 => 
            array (
                'nid' => 2,
                'zacetek' => '2017-05-25',
                'konec' => '2017-05-29',
                'sifra_ps' => 12345,
                'nadomestna_sifra_ps' => 20142,
                'sifra_obisk' => 3,
            ),
            2 => 
            array (
                'nid' => 3,
                'zacetek' => '2017-05-25',
                'konec' => '2017-05-29',
                'sifra_ps' => 12345,
                'nadomestna_sifra_ps' => 20142,
                'sifra_obisk' => 12,
            ),
        ));
        
        
    }
}