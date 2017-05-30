<?php

use Illuminate\Database\Seeder;

class DelovniNalogTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delovni_nalog')->delete();
        
        \DB::table('delovni_nalog')->insert(array (
            0 => 
            array (
                'sifra_dn' => 1,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'L68',
                'sifra_vrsta_obisk' => 10,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-08',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 4,
                'casovni_interval' => 2,
                'created_at' => '2017-05-30 17:43:07',
                'updated_at' => '2017-05-30 17:43:07',
            ),
            1 => 
            array (
                'sifra_dn' => 2,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'H40',
                'sifra_vrsta_obisk' => 20,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-08',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 2,
                'casovni_interval' => 1,
                'created_at' => '2017-05-30 17:43:29',
                'updated_at' => '2017-05-30 17:43:29',
            ),
            2 => 
            array (
                'sifra_dn' => 3,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'A37',
                'sifra_vrsta_obisk' => 40,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-10',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 3,
                'created_at' => '2017-05-30 17:43:50',
                'updated_at' => '2017-05-30 17:43:50',
            ),
            3 => 
            array (
                'sifra_dn' => 4,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'A17',
                'sifra_vrsta_obisk' => 50,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-10',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 2,
                'created_at' => '2017-05-30 17:57:49',
                'updated_at' => '2017-05-30 17:57:49',
            ),
            4 => 
            array (
                'sifra_dn' => 5,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'E66',
                'sifra_vrsta_obisk' => 60,
                'stevilo_epruvet_RdMoRuZe' => '2 1 1 2',
                'datum_prvega_obiska' => '2017-06-12',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 3,
                'created_at' => '2017-05-30 17:59:02',
                'updated_at' => '2017-05-30 17:59:02',
            ),
            5 => 
            array (
                'sifra_dn' => 6,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'A37',
                'sifra_vrsta_obisk' => 70,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-20',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 1,
                'casovni_interval' => 1,
                'created_at' => '2017-05-30 17:59:57',
                'updated_at' => '2017-05-30 17:59:57',
            ),
            6 => 
            array (
                'sifra_dn' => 7,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'A17',
                'sifra_vrsta_obisk' => 10,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-26',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 2,
                'casovni_interval' => 4,
                'created_at' => '2017-05-30 18:06:40',
                'updated_at' => '2017-05-30 18:06:40',
            ),
            7 => 
            array (
                'sifra_dn' => 8,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'S43.0',
                'sifra_vrsta_obisk' => 20,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-27',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 2,
                'casovni_interval' => 3,
                'created_at' => '2017-05-30 18:07:10',
                'updated_at' => '2017-05-30 18:07:10',
            ),
            8 => 
            array (
                'sifra_dn' => 9,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'H53.8',
                'sifra_vrsta_obisk' => 40,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-07-04',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 2,
                'casovni_interval' => 7,
                'created_at' => '2017-05-30 18:07:56',
                'updated_at' => '2017-05-30 18:07:56',
            ),
            9 => 
            array (
                'sifra_dn' => 10,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'A00',
                'sifra_vrsta_obisk' => 50,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-16',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 4,
                'created_at' => '2017-05-30 18:08:40',
                'updated_at' => '2017-05-30 18:08:40',
            ),
            10 => 
            array (
                'sifra_dn' => 11,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'A00',
                'sifra_vrsta_obisk' => 60,
                'stevilo_epruvet_RdMoRuZe' => '1 2 0 0',
                'datum_prvega_obiska' => '2017-07-13',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 1,
                'casovni_interval' => 1,
                'created_at' => '2017-05-30 18:09:02',
                'updated_at' => '2017-05-30 18:09:02',
            ),
            11 => 
            array (
                'sifra_dn' => 12,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'H40',
                'sifra_vrsta_obisk' => 70,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-12',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 1,
                'casovni_interval' => 1,
                'created_at' => '2017-05-30 18:10:29',
                'updated_at' => '2017-05-30 18:10:29',
            ),
            12 => 
            array (
                'sifra_dn' => 13,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'A37',
                'sifra_vrsta_obisk' => 20,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-01',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 1,
                'created_at' => '2017-05-30 18:20:47',
                'updated_at' => '2017-05-30 18:20:47',
            ),
            13 => 
            array (
                'sifra_dn' => 14,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'A00',
                'sifra_vrsta_obisk' => 60,
                'stevilo_epruvet_RdMoRuZe' => '2 0 0 2',
                'datum_prvega_obiska' => '2017-06-01',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 3,
                'created_at' => '2017-05-30 18:23:43',
                'updated_at' => '2017-05-30 18:23:43',
            ),
            14 => 
            array (
                'sifra_dn' => 15,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'A37',
                'sifra_vrsta_obisk' => 50,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-06-05',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 2,
                'created_at' => '2017-05-30 18:25:26',
                'updated_at' => '2017-05-30 18:25:26',
            ),
        ));
        
        
    }
}