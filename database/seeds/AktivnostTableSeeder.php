<?php

use Illuminate\Database\Seeder;

class AktivnostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('aktivnost')->get()->count() == 0){

            DB::table('aktivnost')->insert([
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '10',
                    'ime_aktivnosti' => 'Seznanitev nosečnice o normalnem poteku nosečnosti in o spremembah na telesu.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '20',
                    'ime_aktivnosti' => 'Povabilo v šolo za starše.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '30',
                    'ime_aktivnosti' => 'Seznanitev o rednih ginekoloških pregledih.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '40',
                    'ime_aktivnosti' => 'Seznanitev z bližajočim se porodom in pravočasnim odhodom v porodnišnico.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '50',
                    'ime_aktivnosti' => 'Pogovor in vključevanje partnerja v nosečnost in porod ter po prihodu domov.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '60',
                    'ime_aktivnosti' => 'Svetovanje o pripomočkih, ki jih bo potrebovala v porodnišnici.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '70',
                    'ime_aktivnosti' => 'Seznanitev nosečnice o štetju in beleženju plodovih gibov.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '80',
                    'ime_aktivnosti' => 'Svetovanje glede opreme za novorojenca in primerno ležišče.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '90',
                    'ime_aktivnosti' => 'Svetovanje o pravilni prehrani, ustrezni izbiri obleke in obutve.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '100',
                    'ime_aktivnosti' => 'Svetovanje o primernem režim življenja, telesne vaje, gibanje na svežem zraku.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '110',
                    'ime_aktivnosti' => 'Odsvetovanje razvad kot so uživanje alkohola, kajenje, uživanje zdravil in drog.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '120',
                    'ime_aktivnosti' => 'Seznanitev nosočnice z nevšečnostmi in svetovanje.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '130',
                    'ime_aktivnosti' => 'Seznanitev nosečnice s pravicami do starševskega dopusta.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '140',
                    'ime_aktivnosti' => 'Pričakovan datum poroda.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '150',
                    'ime_aktivnosti' => 'Anamneza: počutje, telesni znaki nosečnosti.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '160',
                    'ime_aktivnosti' => 'Družinska anamneza.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '170',
                    'ime_aktivnosti' => 'Izražanje čustev.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '180',
                    'ime_aktivnosti' => 'Fizična obremenjenost.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '190',
                    'ime_aktivnosti' => 'Krvni pritisk: sistolični, diastolični.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '200',
                    'ime_aktivnosti' => 'Srčni utrip.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '210',
                    'ime_aktivnosti' => 'Dihanje.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '220',
                    'ime_aktivnosti' => 'Telesna temperatura.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '230',
                    'ime_aktivnosti' => 'Telesna teža pred nosečnostjo.'
                ],
                [
                	'sifra_storitve' => '10',
                    'ime_storitve' => 'Obisk nosečnice',
                    'sifra_aktivnosti' => '240',
                    'ime_aktivnosti' => 'Trenutna telesna teža.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '10',
                    'ime_aktivnosti' => 'Pregled materinske knjižice in odpustnice iz porodnišnice.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '20',
                    'ime_aktivnosti' => 'Kontrola vitalnih funkcij.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '30',
                    'ime_aktivnosti' => 'Opazovanje čišče.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '40',
                    'ime_aktivnosti' => 'Nadzor nad izločanjem blata in urina.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '50',
                    'ime_aktivnosti' => 'Zdravstveno vzgojno delo glede pravilnega rokovanja z novorojenčkom.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '60',
                    'ime_aktivnosti' => 'Motivacija za dojenje. Nadzor in pomoč pri dojenju.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '70',
                    'ime_aktivnosti' => 'Svetovanje o čustveni podpori s strani partnerja.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '80',
                    'ime_aktivnosti' => 'Seznanitev o otrokovih potrebah po toplini, nežnosti in varnosti.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '90',
                    'ime_aktivnosti' => 'Svetovanje o spalnih potrebah otročnice, pravilni negi in higienskem režimu.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '100',
                    'ime_aktivnosti' => 'Svetovanje o pravilni prehrani, pitju ustreznih količin tekočin.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '110',
                    'ime_aktivnosti' => 'Poučitev o poporodni telovadbi.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '120',
                    'ime_aktivnosti' => 'Sezananitev z nekaterimi obolenji.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '130',
                    'ime_aktivnosti' => 'Napotitev na poporodni pregled.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '140',
                    'ime_aktivnosti' => 'Seznanitev z metodami zaščite pred nezaželjno nosečnostjo.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '150',
                    'ime_aktivnosti' => 'Svetovanje o normalnem delu, življenju in spolnih odnosih.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '160',
                    'ime_aktivnosti' => 'Krvni pritisk.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '170',
                    'ime_aktivnosti' => 'Srčni utrip.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '180',
                    'ime_aktivnosti' => 'Dihanje.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '190',
                    'ime_aktivnosti' => 'Telesna temperatura.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '200',
                    'ime_aktivnosti' => 'Trenutna telesna teža.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '210',
                    'ime_aktivnosti' => 'Anamneza: počutje, telesni znaki nosečnosti.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '220',
                    'ime_aktivnosti' => 'Družinska anamneza.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '230',
                    'ime_aktivnosti' => 'Izražanje čustev.'
                ],
                [
                	'sifra_storitve' => '20',
                    'ime_storitve' => 'Obisk otročnice',
                    'sifra_aktivnosti' => '240',
                    'ime_aktivnosti' => 'Fizična obremenjenost.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '10',
                    'ime_aktivnosti' => 'Prikaz nege dojenčka.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '20',
                    'ime_aktivnosti' => 'Nega popokovne rane.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '30',
                    'ime_aktivnosti' => 'Nudenje pomoči pri dojenju in seznanitev s tehnikami dojenja.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '40',
                    'ime_aktivnosti' => 'Ureditev ležišča.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '50',
                    'ime_aktivnosti' => 'Svetovanje o povijanju, oblačenju, slačenju.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '60',
                    'ime_aktivnosti' => 'Trenutna telesna teža.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '70',
                    'ime_aktivnosti' => 'Trenutna telesna višina.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '80',
                    'ime_aktivnosti' => 'Dojenje.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '90',
                    'ime_aktivnosti' => 'Dodajanje adaptiranega mleka.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '100',
                    'ime_aktivnosti' => 'Izločanje in odvajanje.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '110',
                    'ime_aktivnosti' => 'Ritem spanja.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '120',
                    'ime_aktivnosti' => 'Povišanje bilirubina (zlatenica).'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '130',
                    'ime_aktivnosti' => 'Kolki.'
                ],
                [
                	'sifra_storitve' => '30',
                    'ime_storitve' => 'Obisk novorojenčka',
                    'sifra_aktivnosti' => '130',
                    'ime_aktivnosti' => 'Posebnosti.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '10',
                    'ime_aktivnosti' => 'Anamneza.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '20',
                    'ime_aktivnosti' => 'Družinska anamneza.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '30',
                    'ime_aktivnosti' => 'Krvni pritisk: sistolični, diastolični.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '40',
                    'ime_aktivnosti' => 'Srčni utrip.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '50',
                    'ime_aktivnosti' => 'Dihanje.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '60',
                    'ime_aktivnosti' => 'Telesna temperatura.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '70',
                    'ime_aktivnosti' => 'Telesna teža.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '80',
                    'ime_aktivnosti' => 'Osebna higiena.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '90',
                    'ime_aktivnosti' => 'Prehranjevanje in pitje.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '100',
                    'ime_aktivnosti' => 'Izločanje in odvajanje.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '110',
                    'ime_aktivnosti' => 'Gibanje.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '120',
                    'ime_aktivnosti' => 'Čutila in občutki.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '130',
                    'ime_aktivnosti' => 'Spanje in počitek.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '140',
                    'ime_aktivnosti' => 'Duševno stanje: izražanje čustev in potreb, komunikacija.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '150',
                    'ime_aktivnosti' => 'Stanje neodvisnosti.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '160',
                    'ime_aktivnosti' => 'Pregled predpisanih terapij.'
                ],
                [
                	'sifra_storitve' => '40',
                    'ime_storitve' => 'Preventiva starostnika',
                    'sifra_aktivnosti' => '170',
                    'ime_aktivnosti' => 'Pogovor, nasvet in vzpodbuda.'
                ],
                [
                	'sifra_storitve' => '50',
                    'ime_storitve' => 'Aplikacija injekcij',
                    'sifra_aktivnosti' => '10',
                    'ime_aktivnosti' => 'Aplikacija injekcije.'
                ],
                [
                	'sifra_storitve' => '50',
                    'ime_storitve' => 'Aplikacija injekcij',
                    'sifra_aktivnosti' => '20',
                    'ime_aktivnosti' => 'Pogovor, nasvet in vzpodbuda.'
                ],
                [
                	'sifra_storitve' => '60',
                    'ime_storitve' => 'Odvzem krvi',
                    'sifra_aktivnosti' => '10',
                    'ime_aktivnosti' => 'Odvzem krvi.'
                ],
                [
                	'sifra_storitve' => '60',
                    'ime_storitve' => 'Odvzem krvi',
                    'sifra_aktivnosti' => '20',
                    'ime_aktivnosti' => 'Pogovor, nasvet in vzpodbuda.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '10',
                    'ime_aktivnosti' => 'Anamneza.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '20',
                    'ime_aktivnosti' => 'Krvni pritisk: sistolični, diastolični.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '30',
                    'ime_aktivnosti' => 'Srčni utrip.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '40',
                    'ime_aktivnosti' => 'Dihanje.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '50',
                    'ime_aktivnosti' => 'Telesna temperatura.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '60',
                    'ime_aktivnosti' => 'Krvni sladkor.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '70',
                    'ime_aktivnosti' => 'Oksigenacija SpO2.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '80',
                    'ime_aktivnosti' => 'Upoštevanje terapije.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '90',
                    'ime_aktivnosti' => 'Pregled terapije.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '100',
                    'ime_aktivnosti' => 'Navodila za terapijo do naslednjega obiska.'
                ],
                [
                	'sifra_storitve' => '70',
                    'ime_storitve' => 'Kontrola zdravstvenega stanja',
                    'sifra_aktivnosti' => '110',
                    'ime_aktivnosti' => 'Pogovor, nasvet in vzpodbuda.'
                ],
            ]);
        }
    }
}
