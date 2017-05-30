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
                'zdravilo_sifra_zdravilo' => 'L04AA31',
            ),
            1 => 
            array (
                'id' => 2,
                'delovni_nalog_sifra_dn' => 4,
                'zdravilo_sifra_zdravilo' => 'B01AC06',
            ),
            2 => 
            array (
                'id' => 3,
                'delovni_nalog_sifra_dn' => 4,
                'zdravilo_sifra_zdravilo' => 'C09CA07',
            ),
            3 => 
            array (
                'id' => 4,
                'delovni_nalog_sifra_dn' => 10,
                'zdravilo_sifra_zdravilo' => 'C10AA05',
            ),
            4 => 
            array (
                'id' => 5,
                'delovni_nalog_sifra_dn' => 10,
                'zdravilo_sifra_zdravilo' => 'L04AA31',
            ),
            5 => 
            array (
                'id' => 6,
                'delovni_nalog_sifra_dn' => 10,
                'zdravilo_sifra_zdravilo' => 'A11HA02',
            ),
            6 => 
            array (
                'id' => 7,
                'delovni_nalog_sifra_dn' => 15,
                'zdravilo_sifra_zdravilo' => 'C10AA07',
            ),
            7 => 
            array (
                'id' => 8,
                'delovni_nalog_sifra_dn' => 15,
                'zdravilo_sifra_zdravilo' => 'B01AC06',
            ),
            8 => 
            array (
                'id' => 9,
                'delovni_nalog_sifra_dn' => 18,
                'zdravilo_sifra_zdravilo' => 'B01AC06',
            ),
        ));
        
        
    }
}