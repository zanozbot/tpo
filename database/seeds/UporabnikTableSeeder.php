<?php

use Illuminate\Database\Seeder;

class UporabnikTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('uporabnik')->delete();
        
        \DB::table('uporabnik')->insert(array (
            0 => 
            array (
                'id_uporabnik' => 1,
                'sifra_vloga' => 1,
                'ime' => 'Admin',
                'priimek' => 'Administratorjev',
                'email' => 'admin@gmail.com',
                'geslo' => '$2y$10$8xnmkhfeNSdSqwYaUP2JtuwwB2xxxZxpdGIVRV.JEweiQp.KgydNC',
                'tel_stevilka' => '051000001',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:04:00',
                'updated_at' => '2017-05-30 17:18:28',
            ),
            1 => 
            array (
                'id_uporabnik' => 2,
                'sifra_vloga' => 2,
                'ime' => 'Zdravko',
                'priimek' => 'Zdravič',
                'email' => 'zdravko@mailinator.com',
                'geslo' => '$2y$10$zVgA1DmagnoacaZHN9ZncOntHy8IP3q3B.GNnv74qZVrGeR7Xpc6O',
                'tel_stevilka' => '051000002',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:04:01',
                'updated_at' => '2017-05-30 17:01:25',
            ),
            2 => 
            array (
                'id_uporabnik' => 3,
                'sifra_vloga' => 2,
                'ime' => 'Marko',
                'priimek' => 'Markič',
                'email' => 'marko@mailinator.com',
                'geslo' => '$2y$10$71UvNg1LG4ZCObWPOoi7gerOutfx1qgdrSLJa4HGrn8IEyY5WoSla',
                'tel_stevilka' => '051000003',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:04:01',
                'updated_at' => '2017-05-30 16:04:01',
            ),
            3 => 
            array (
                'id_uporabnik' => 4,
                'sifra_vloga' => 3,
                'ime' => 'Vodja',
                'priimek' => 'Vodjič',
                'email' => 'vodja@mailinator.com',
                'geslo' => '$2y$10$p25tEjX5zUG8anvzWoc6IuHPvrUXxNpNYGlLdWhHpu.ZmO8MYjUM6',
                'tel_stevilka' => '051000013',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:04:01',
                'updated_at' => '2017-05-30 16:04:01',
            ),
            4 => 
            array (
                'id_uporabnik' => 5,
                'sifra_vloga' => 6,
                'ime' => 'Ksenija',
                'priimek' => 'Debevc',
                'email' => 'pacient@mailinator.com',
                'geslo' => '$2y$10$LwWl96/JYvI/Rl95F8UScu2p9NrKohaaFlU86Rh52K0WmdwyizK7a',
                'tel_stevilka' => '051000006',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:04:01',
                'updated_at' => '2017-05-30 16:48:05',
            ),
            5 => 
            array (
                'id_uporabnik' => 6,
                'sifra_vloga' => 6,
                'ime' => 'Blaž',
                'priimek' => 'Blažič',
                'email' => 'blazic@mailinator.com',
                'geslo' => '$2y$10$LYhJ.GMBLsyfyNfDoIBBreQB6q0ZXYYnt45HHB5T.FY5hbhcCzmNC',
                'tel_stevilka' => '051777111',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:12:34',
                'updated_at' => '2017-05-30 16:15:04',
            ),
            6 => 
            array (
                'id_uporabnik' => 7,
                'sifra_vloga' => 6,
                'ime' => 'Anton',
                'priimek' => 'Antončič',
                'email' => 'antoncic@mailinator.com',
                'geslo' => '$2y$10$S08FE7YnQMktpYzuR8Q/L.THfFhJ2F160rvEgWmlenaUYJ5rl5E.O',
                'tel_stevilka' => '031444222',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:17:55',
                'updated_at' => '2017-05-30 16:18:54',
            ),
            7 => 
            array (
                'id_uporabnik' => 8,
                'sifra_vloga' => 6,
                'ime' => 'Jana',
                'priimek' => 'Janezič',
                'email' => 'janezic@mailinator.com',
                'geslo' => '$2y$10$DVUUiQklL3K.57DFptoMou0iBvR2h0ulGKNdJ5ji6fRDxsPkgEBJy',
                'tel_stevilka' => '041222111',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:33:28',
                'updated_at' => '2017-05-30 16:33:50',
            ),
            8 => 
            array (
                'id_uporabnik' => 9,
                'sifra_vloga' => 4,
                'ime' => 'Franja',
                'priimek' => 'Frankovič',
                'email' => 'frankovic@mailinator.com',
                'geslo' => '$2y$10$q5dWt/HmtXU0W5xcExS8R.cAVZpMZa/OSDE76Fj8xao5Jz0BZQHnu',
                'tel_stevilka' => '031445112',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:42:57',
                'updated_at' => '2017-05-30 16:42:57',
            ),
            9 => 
            array (
                'id_uporabnik' => 10,
                'sifra_vloga' => 4,
                'ime' => 'Petra',
                'priimek' => 'Petrovič',
                'email' => 'petrovic@mailinator.com',
                'geslo' => '$2y$10$KVEwlijeOr4.PNHKPnDOPu1OSQVckeBnswZ0IxH6XtdrM09klmo82',
                'tel_stevilka' => '080123441',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:43:53',
                'updated_at' => '2017-05-30 16:43:53',
            ),
            10 => 
            array (
                'id_uporabnik' => 11,
                'sifra_vloga' => 4,
                'ime' => 'Vida',
                'priimek' => 'Vidič',
                'email' => 'vidic@mailinator.com',
                'geslo' => '$2y$10$0LY6t//0vfEZnpI9MM5aQejgKkSJjWEANaq6rdvQYxnKMtsA6fkuK',
                'tel_stevilka' => '091881223',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 16:45:13',
                'updated_at' => '2017-05-30 16:45:13',
            ),
            11 => 
            array (
                'id_uporabnik' => 12,
                'sifra_vloga' => 6,
                'ime' => 'Mirko',
                'priimek' => 'Car',
                'email' => 'mirko@mailinator.com',
                'geslo' => '$2y$10$hGWDs7JOzHJQkRLiXdW9TeCEhezJ4xuO9a0S/PqzLVK.sVdvh7Mv.',
                'tel_stevilka' => '032223112',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 17:16:21',
                'updated_at' => '2017-05-30 17:16:21',
            ),
            12 => 
            array (
                'id_uporabnik' => 13,
                'sifra_vloga' => 4,
                'ime' => 'Nezhka',
                'priimek' => 'Vodopivec',
                'email' => 'vodopivec@mailinator.com',
                'geslo' => '$2y$10$atx/fOOovIQwIjMQloXi4eJu9IlzQ6Ojfr4mGIjtgE0T63DD8BBdC',
                'tel_stevilka' => '090122331',
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 17:19:27',
                'updated_at' => '2017-05-30 17:19:27',
            ),
            13 => 
            array (
                'id_uporabnik' => 14,
                'sifra_vloga' => 6,
                'ime' => 'Iza',
                'priimek' => 'Debevc',
                'email' => NULL,
                'geslo' => NULL,
                'tel_stevilka' => NULL,
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 17:19:27',
                'updated_at' => '2017-05-30 17:19:27',
            ),
            14 => 
            array (
                'id_uporabnik' => 15,
                'sifra_vloga' => 6,
                'ime' => 'Miha',
                'priimek' => 'Debevc',
                'email' => NULL,
                'geslo' => NULL,
                'tel_stevilka' => NULL,
                'aktiviran' => 1,
                'datum_prijave' => NULL,
                'remember_token' => NULL,
                'created_at' => '2017-05-30 17:19:27',
                'updated_at' => '2017-05-30 17:19:27',
            ),
        ));
        
        
    }
}