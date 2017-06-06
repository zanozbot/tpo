<?php

use Illuminate\Database\Seeder;

class DelovniNalogZdraviloTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delovni_nalog_zdravilo')->delete();
        
        \DB::table('delovni_nalog_zdravilo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'delovni_nalog_sifra_dn' => 4,
                'zdravilo_sifra_zdravilo' => '146028',
            ),
            1 => 
            array (
                'id' => 2,
                'delovni_nalog_sifra_dn' => 4,
                'zdravilo_sifra_zdravilo' => '046493',
            ),
            2 => 
            array (
                'id' => 3,
                'delovni_nalog_sifra_dn' => 4,
                'zdravilo_sifra_zdravilo' => '040185',
            ),
            3 => 
            array (
                'id' => 4,
                'delovni_nalog_sifra_dn' => 10,
                'zdravilo_sifra_zdravilo' => '119857',
            ),
            4 => 
            array (
                'id' => 5,
                'delovni_nalog_sifra_dn' => 10,
                'zdravilo_sifra_zdravilo' => '096040',
            ),
            5 => 
            array (
                'id' => 6,
                'delovni_nalog_sifra_dn' => 10,
                'zdravilo_sifra_zdravilo' => '040185',
            ),
            6 => 
            array (
                'id' => 7,
                'delovni_nalog_sifra_dn' => 15,
                'zdravilo_sifra_zdravilo' => '097691',
            ),
            7 => 
            array (
                'id' => 8,
                'delovni_nalog_sifra_dn' => 15,
                'zdravilo_sifra_zdravilo' => '144717',
            ),
            8 => 
            array (
                'id' => 9,
                'delovni_nalog_sifra_dn' => 18,
                'zdravilo_sifra_zdravilo' => '096040',
            ),
        ));
        
        
    }
}