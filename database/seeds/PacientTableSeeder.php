<?php

use Illuminate\Database\Seeder;

class PacientTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pacient')->delete();
        
        \DB::table('pacient')->insert(array (
            0 => 
            array (
                'stevilka_KZZ' => 1234567890,
                'postna_stevilka' => 1000,
                'pac_stevilka_KZZ' => -1,
                'ime' => 'Ksenija',
                'priimek' => 'Debevc',
                'sifra_okolis' => 3,
                'ulica' => 'Rožna Dolina, cesta IV 45',
                'kraj' => 'Ljubljana',
                'datum_rojstva' => '1989-07-12',
                'spol' => 'z',
                'sifra_razmerje' => '/',
                'id_uporabnik' => 5,
            ),
            1 => 
            array (
                'stevilka_KZZ' => 1111111111,
                'postna_stevilka' => 1000,
                'pac_stevilka_KZZ' => 1234567890,
                'ime' => 'Iza',
                'priimek' => 'Debevc',
                'sifra_okolis' => 3,
                'ulica' => 'Rožna Dolina, cesta IV 45',
                'kraj' => 'Ljubljana',
                'datum_rojstva' => '2010-06-17',
                'spol' => 'z',
                'sifra_razmerje' => 'A1',
                'id_uporabnik' => 14,
            ),
            2 => 
            array (
                'stevilka_KZZ' => 1211111111,
                'postna_stevilka' => 1000,
                'pac_stevilka_KZZ' => 1234567890,
                'ime' => 'Miha',
                'priimek' => 'Debevc',
                'sifra_okolis' => 3,
                'ulica' => 'Rožna Dolina, cesta IV 45',
                'kraj' => 'Ljubljana',
                'datum_rojstva' => '2017-03-10',
                'spol' => 'm',
                'sifra_razmerje' => 'A1',
                'id_uporabnik' => 15,
            ),
            3 => 
            array (
                'stevilka_KZZ' => 1311111111,
                'postna_stevilka' => 1000,
                'pac_stevilka_KZZ' => -1,
                'ime' => 'Blaž',
                'priimek' => 'Blažič',
                'sifra_okolis' => 2,
                'ulica' => 'Polje cesta XI',
                'kraj' => 'Ljubljana',
                'datum_rojstva' => '1946-09-21',
                'spol' => 'm',
                'sifra_razmerje' => '/',
                'id_uporabnik' => 6,
            ),
            4 => 
            array (
                'stevilka_KZZ' => 1411111111,
                'postna_stevilka' => 1000,
                'pac_stevilka_KZZ' => -1,
                'ime' => 'Anton',
                'priimek' => 'Antončič',
                'sifra_okolis' => 2,
                'ulica' => 'Polje cesta IX',
                'kraj' => 'Ljubljana',
                'datum_rojstva' => '1974-11-20',
                'spol' => 'm',
                'sifra_razmerje' => '/',
                'id_uporabnik' => 7,
            ),
            5 => 
            array (
                'stevilka_KZZ' => 1511111111,
                'postna_stevilka' => 1000,
                'pac_stevilka_KZZ' => -1,
                'ime' => 'Jana',
                'priimek' => 'Janezič',
                'sifra_okolis' => 5,
                'ulica' => 'Drenov Grič 165',
                'kraj' => 'Ljubljana',
                'datum_rojstva' => '1991-10-18',
                'spol' => 'z',
                'sifra_razmerje' => '/',
                'id_uporabnik' => 8,
            ),
            6 => 
            array (
                'stevilka_KZZ' => 1122222222,
                'postna_stevilka' => 2000,
                'pac_stevilka_KZZ' => -1,
                'ime' => 'Mirko',
                'priimek' => 'Car',
                'sifra_okolis' => 11,
                'ulica' => 'Čečovje 6',
                'kraj' => 'Ravne na Koroškem',
                'datum_rojstva' => '1931-07-27',
                'spol' => 'm',
                'sifra_razmerje' => '/',
                'id_uporabnik' => 13,
            ),
        ));
        
        
    }
}