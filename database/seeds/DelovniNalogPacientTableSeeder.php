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
                'pacient_stevilka_KZZ' => 1511111111,
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
                'pacient_stevilka_KZZ' => 1211111111,
                'delovni_nalog_sifra_dn' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'pacient_stevilka_KZZ' => 1122222222,
                'delovni_nalog_sifra_dn' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'pacient_stevilka_KZZ' => 1311111111,
                'delovni_nalog_sifra_dn' => 4,
            ),
            5 => 
            array (
                'id' => 6,
                'pacient_stevilka_KZZ' => 1411111111,
                'delovni_nalog_sifra_dn' => 5,
            ),
            6 => 
            array (
                'id' => 7,
                'pacient_stevilka_KZZ' => 1122222222,
                'delovni_nalog_sifra_dn' => 6,
            ),
            7 => 
            array (
                'id' => 8,
                'pacient_stevilka_KZZ' => 1511111111,
                'delovni_nalog_sifra_dn' => 7,
            ),
            8 => 
            array (
                'id' => 9,
                'pacient_stevilka_KZZ' => 1234567890,
                'delovni_nalog_sifra_dn' => 8,
            ),
            9 => 
            array (
                'id' => 10,
                'pacient_stevilka_KZZ' => 1211111111,
                'delovni_nalog_sifra_dn' => 8,
            ),
            10 => 
            array (
                'id' => 11,
                'pacient_stevilka_KZZ' => 1122222222,
                'delovni_nalog_sifra_dn' => 9,
            ),
            11 => 
            array (
                'id' => 12,
                'pacient_stevilka_KZZ' => 1311111111,
                'delovni_nalog_sifra_dn' => 10,
            ),
            12 => 
            array (
                'id' => 13,
                'pacient_stevilka_KZZ' => 1234567890,
                'delovni_nalog_sifra_dn' => 11,
            ),
            13 => 
            array (
                'id' => 14,
                'pacient_stevilka_KZZ' => 1511111111,
                'delovni_nalog_sifra_dn' => 12,
            ),
            14 => 
            array (
                'id' => 15,
                'pacient_stevilka_KZZ' => 1234567890,
                'delovni_nalog_sifra_dn' => 13,
            ),
            15 => 
            array (
                'id' => 16,
                'pacient_stevilka_KZZ' => 1211111111,
                'delovni_nalog_sifra_dn' => 13,
            ),
            16 => 
            array (
                'id' => 17,
                'pacient_stevilka_KZZ' => 1411111111,
                'delovni_nalog_sifra_dn' => 14,
            ),
            17 => 
            array (
                'id' => 18,
                'pacient_stevilka_KZZ' => 1511111111,
                'delovni_nalog_sifra_dn' => 15,
            ),
            18 => 
            array (
                'id' => 19,
                'pacient_stevilka_KZZ' => 1511111111,
                'delovni_nalog_sifra_dn' => 16,
            ),
            19 => 
            array (
                'id' => 20,
                'pacient_stevilka_KZZ' => 1311111111,
                'delovni_nalog_sifra_dn' => 17,
            ),
            20 => 
            array (
                'id' => 21,
                'pacient_stevilka_KZZ' => 1311111111,
                'delovni_nalog_sifra_dn' => 18,
            ),
            21 => 
            array (
                'id' => 22,
                'pacient_stevilka_KZZ' => 1311111111,
                'delovni_nalog_sifra_dn' => 19,
            ),
        ));
        
        
    }
}