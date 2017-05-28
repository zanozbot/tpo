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
                	'sifra_zdravilo' => 'C10AA05',
                    'ime' => 'Atorvastatin',
                    'opis' => 'Atoris 20 mg filmsko obložene tablete',
                    'cena' => 7.99
                ],
                [
                	'sifra_zdravilo' => 'L04AA31',
                    'ime' => 'Teriflunomid',
                    'opis' => 'Aubagio 14 mg filmsko obložene tablete',
                    'cena' => 5.99
                ],
                [
                	'sifra_zdravilo' => 'C10AA07',
                    'ime' => 'Rosuvastatin',
                    'opis' => 'CRESTOR 5 mg filmsko obložene tablete',
                    'cena' => 6.99
                ],
                [
                	'sifra_zdravilo' => 'B01AC06',
                    'ime' => 'Acetilsalicilna kislina',
                    'opis' => 'Aspirin protect 100 mg gastrorezistentne tablete',
                    'cena' => 8.99
                ],
                [
                	'sifra_zdravilo' => 'N05AH03',
                    'ime' => 'Olanzapin',
                    'opis' => 'Olanzapin Teva 10 mg orodisperzibilne tablete',
                    'cena' => 9.99
                ],
                [
                	'sifra_zdravilo' => 'C09BB04',
                    'ime' => 'Perindopril in amlodipin',
                    'opis' => 'PRESTANCE 5 mg/10 mg tablete',
                    'cena' => 6.99
                ],
                [
                	'sifra_zdravilo' => 'D06BX01',
                    'ime' => 'Metronidazol',
                    'opis' => 'Rozamet 10 mg/g krema',
                    'cena' => 8.99
                ],
                [
                	'sifra_zdravilo' => 'C09CA07',
                    'ime' => 'Telmisartan',
                    'opis' => 'Telmisartan Lek 40 mg tablete',
                    'cena' => 7.99
                ],
                [
                	'sifra_zdravilo' => 'A11HA02',
                    'ime' => 'Piridoksin (vitamin B6)',
                    'opis' => 'Vitamin B6 20 MG Jenapharm tablete',
                    'cena' => 9.99
                ],
                [
                	'sifra_zdravilo' => 'N05BA12',
                    'ime' => 'Alprazolam',
                    'opis' => 'XANAX 1 mg tablete',
                    'cena' => 5.99
                ]
            ]);
        }
    }
}
