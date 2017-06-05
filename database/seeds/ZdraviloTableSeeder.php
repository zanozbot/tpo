<?php

use Illuminate\Database\Seeder;

class ZdraviloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('zdravilo')->get()->count() == 0){

            DB::table('zdravilo')->insert([
                [
                	'sifra_zdravilo' => '040185',
                    'ime' => 'Atoris',
                    'opis' => 'Atoris 20 mg filmsko obložene tablete',
                    'cena' => 7.99
                ],
                [
                	'sifra_zdravilo' => '146028',
                    'ime' => 'Aubagio',
                    'opis' => 'Aubagio 14 mg filmsko obložene tablete',
                    'cena' => 5.99
                ],
                [
                	'sifra_zdravilo' => '097691',
                    'ime' => 'Crestor',
                    'opis' => 'CRESTOR 5 mg filmsko obložene tablete',
                    'cena' => 6.99
                ],
                [
                	'sifra_zdravilo' => '072907',
                    'ime' => 'Aspirin protect',
                    'opis' => 'Aspirin protect 100 mg gastrorezistentne tablete',
                    'cena' => 8.99
                ],
                [
                	'sifra_zdravilo' => '046493',
                    'ime' => 'Olanzapin Teva',
                    'opis' => 'Olanzapin Teva 10 mg orodisperzibilne tablete',
                    'cena' => 9.99
                ],
                [
                	'sifra_zdravilo' => '142191',
                    'ime' => 'PRESTANCE',
                    'opis' => 'PRESTANCE 5 mg/10 mg tablete',
                    'cena' => 6.99
                ],
                [
                	'sifra_zdravilo' => '005800',
                    'ime' => 'Rozamet',
                    'opis' => 'Rozamet 10 mg/g krema',
                    'cena' => 8.99
                ],
                [
                	'sifra_zdravilo' => '119857',
                    'ime' => 'Telmisartan Lek',
                    'opis' => 'Telmisartan Lek 40 mg tablete',
                    'cena' => 7.99
                ],
                [
                	'sifra_zdravilo' => '144717',
                    'ime' => 'VITAMIN B6',
                    'opis' => 'VITAMIN B6 20 MG JENAPHARM TABLETE',
                    'cena' => 9.99
                ],
                [
                	'sifra_zdravilo' => '096040',
                    'ime' => 'XANAX',
                    'opis' => 'XANAX 1 mg tablete',
                    'cena' => 5.99
                ]
            ]);
        }
    }
}
