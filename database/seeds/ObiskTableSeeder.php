<?php

use Illuminate\Database\Seeder;

class ObiskTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('obisk')->delete();
        
        \DB::table('obisk')->insert(array (
            0 => 
            array (
                'sifra_obisk' => 1,
                'sifra_dn' => 1,
                'sifra_plan' => 1,
                'originalna_sifra_plan' => 1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => 20142,
                'datum_obiska' => '2017-05-25',
                'datum_opravljenosti_obiska' => '2017-05-25',
                'opravljen' => 1,
                'nadomescanje' => 1,
            ),
            1 => 
            array (
                'sifra_obisk' => 2,
                'sifra_dn' => 2,
                'sifra_plan' => 2,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 20142,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-05-23',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            2 => 
            array (
                'sifra_obisk' => 3,
                'sifra_dn' => 3,
                'sifra_plan' => 3,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => 20142,
                'datum_obiska' => '2017-05-29',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 1,
            ),
            3 => 
            array (
                'sifra_obisk' => 4,
                'sifra_dn' => 3,
                'sifra_plan' => 4,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-05-31',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            4 => 
            array (
                'sifra_obisk' => 5,
                'sifra_dn' => 3,
                'sifra_plan' => 5,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-06-02',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            5 => 
            array (
                'sifra_obisk' => 6,
                'sifra_dn' => 3,
                'sifra_plan' => 6,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-06-05',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            6 => 
            array (
                'sifra_obisk' => 7,
                'sifra_dn' => 4,
                'sifra_plan' => 7,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 20142,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-05-31',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            7 => 
            array (
                'sifra_obisk' => 8,
                'sifra_dn' => 4,
                'sifra_plan' => 8,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 20142,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-06-02',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            8 => 
            array (
                'sifra_obisk' => 9,
                'sifra_dn' => 5,
                'sifra_plan' => 9,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-06-01',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            9 => 
            array (
                'sifra_obisk' => 10,
                'sifra_dn' => 5,
                'sifra_plan' => 6,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-06-05',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            10 => 
            array (
                'sifra_obisk' => 11,
                'sifra_dn' => 5,
                'sifra_plan' => 10,
                'originalna_sifra_plan' => -1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => NULL,
                'datum_obiska' => '2017-06-07',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 0,
            ),
            11 => 
            array (
                'sifra_obisk' => 12,
                'sifra_dn' => 6,
                'sifra_plan' => 1,
                'originalna_sifra_plan' => 1,
                'sifra_ps' => 12345,
                'sifra_nadomestne_ps' => 20142,
                'datum_obiska' => '2017-05-25',
                'datum_opravljenosti_obiska' => NULL,
                'opravljen' => 0,
                'nadomescanje' => 1,
            ),
        ));
        
        
    }
}