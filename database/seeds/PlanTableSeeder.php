<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plan')->delete();
        
        \DB::table('plan')->insert(array (
            0 => 
            array (
                'sifra_plan' => 1,
                'datum_plan' => '2017-05-25',
                'sifra_ps_plan' => 20142,
            ),
            1 => 
            array (
                'sifra_plan' => 2,
                'datum_plan' => '2017-05-26',
                'sifra_ps_plan' => 20142,
            ),
            2 => 
            array (
                'sifra_plan' => 3,
                'datum_plan' => '2017-05-29',
                'sifra_ps_plan' => 20142,
            ),
            3 => 
            array (
                'sifra_plan' => 4,
                'datum_plan' => '2017-05-31',
                'sifra_ps_plan' => 12345,
            ),
            4 => 
            array (
                'sifra_plan' => 5,
                'datum_plan' => '2017-06-02',
                'sifra_ps_plan' => 12345,
            ),
            5 => 
            array (
                'sifra_plan' => 6,
                'datum_plan' => '2017-06-05',
                'sifra_ps_plan' => 12345,
            ),
            6 => 
            array (
                'sifra_plan' => 7,
                'datum_plan' => '2017-05-31',
                'sifra_ps_plan' => 20142,
            ),
            7 => 
            array (
                'sifra_plan' => 8,
                'datum_plan' => '2017-06-02',
                'sifra_ps_plan' => 20142,
            ),
            8 => 
            array (
                'sifra_plan' => 9,
                'datum_plan' => '2017-06-01',
                'sifra_ps_plan' => 12345,
            ),
            9 => 
            array (
                'sifra_plan' => 10,
                'datum_plan' => '2017-06-07',
                'sifra_ps_plan' => 12345,
            ),
        ));
        
        
    }
}