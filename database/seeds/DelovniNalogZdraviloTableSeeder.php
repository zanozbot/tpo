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
                'zdravilo_sifra_zdravilo' => 'C10AA05',
            ),
            1 => 
            array (
                'id' => 2,
                'delovni_nalog_sifra_dn' => 4,
                'zdravilo_sifra_zdravilo' => 'L04AA31',
            ),
            2 => 
            array (
                'id' => 3,
                'delovni_nalog_sifra_dn' => 4,
                'zdravilo_sifra_zdravilo' => 'C10AA07',
            ),
        ));
        
        
    }
}