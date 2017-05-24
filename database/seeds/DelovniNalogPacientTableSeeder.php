<?php

use Illuminate\Database\Seeder;

class DelovniNalogPacientTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delovni_nalog_pacient')->delete();
        
        \DB::table('delovni_nalog_pacient')->insert(array (
            0 => 
            array (
                'id' => 1,
                'pacient_stevilka_KZZ' => 1234647123,
                'delovni_nalog_sifra_dn' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'pacient_stevilka_KZZ' => 1234567890,
                'delovni_nalog_sifra_dn' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'pacient_stevilka_KZZ' => 1234567892,
                'delovni_nalog_sifra_dn' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'pacient_stevilka_KZZ' => 1465567123,
                'delovni_nalog_sifra_dn' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'pacient_stevilka_KZZ' => 1234567890,
                'delovni_nalog_sifra_dn' => 4,
            ),
            5 => 
            array (
                'id' => 6,
                'pacient_stevilka_KZZ' => 1234647123,
                'delovni_nalog_sifra_dn' => 5,
            ),
            6 => 
            array (
                'id' => 7,
                'pacient_stevilka_KZZ' => 1465567123,
                'delovni_nalog_sifra_dn' => 6,
            ),
        ));
        
        
    }
}