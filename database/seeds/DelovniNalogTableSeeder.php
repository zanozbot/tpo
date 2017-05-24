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
                'sifra_delavec' => 55641,
                'sifra_bolezen' => 'A37',
                'sifra_vrsta_obisk' => 10,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-05-25',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 1,
                'casovni_interval' => 1,
                'created_at' => '2017-05-24 17:21:48',
                'updated_at' => '2017-05-24 17:21:48',
            ),
            1 => 
            array (
                'sifra_dn' => 2,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'E66',
                'sifra_vrsta_obisk' => 20,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-05-27',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 1,
                'casovni_interval' => 1,
                'created_at' => '2017-05-24 17:22:12',
                'updated_at' => '2017-05-24 17:22:12',
            ),
            2 => 
            array (
                'sifra_dn' => 3,
                'sifra_delavec' => 53424,
                'sifra_bolezen' => 'S43.0',
                'sifra_vrsta_obisk' => 40,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-05-29',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 4,
                'casovni_interval' => 2,
                'created_at' => '2017-05-24 17:22:34',
                'updated_at' => '2017-05-24 17:22:34',
            ),
            3 => 
            array (
                'sifra_dn' => 4,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'A17',
                'sifra_vrsta_obisk' => 50,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-05-31',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 2,
                'casovni_interval' => 2,
                'created_at' => '2017-05-24 17:23:22',
                'updated_at' => '2017-05-24 17:23:22',
            ),
            4 => 
            array (
                'sifra_dn' => 5,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'A00',
                'sifra_vrsta_obisk' => 60,
                'stevilo_epruvet_RdMoRuZe' => '1 1 2 1',
                'datum_prvega_obiska' => '2017-06-01',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 0,
                'stevilo_obiskov' => 3,
                'casovni_interval' => 3,
                'created_at' => '2017-05-24 17:24:07',
                'updated_at' => '2017-05-24 17:24:07',
            ),
            5 => 
            array (
                'sifra_dn' => 6,
                'sifra_delavec' => 33124,
                'sifra_bolezen' => 'H53.8',
                'sifra_vrsta_obisk' => 70,
                'stevilo_epruvet_RdMoRuZe' => '0 0 0 0',
                'datum_prvega_obiska' => '2017-05-25',
                'datum_koncnega_obiska' => NULL,
                'datum_obvezen' => 1,
                'stevilo_obiskov' => 1,
                'casovni_interval' => 1,
                'created_at' => '2017-05-24 17:24:25',
                'updated_at' => '2017-05-24 17:24:25',
            ),
        ));
        
        
    }
}