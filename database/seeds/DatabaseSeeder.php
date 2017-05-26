<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VlogaTableSeeder::class);
        $this->call(AdministratorUporabnikTableSeeder::class);
        $this->call(BolezenTableSeeder::class);
        $this->call(ZdraviloTableSeeder::class);
        $this->call(PostaTableSeeder::class);
        $this->call(IzvajalecZDTableSeeder::class);
        $this->call(VrstaObiskaTableSeeder::class);
        $this->call(OkolisTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(SorodstvenoRazmerjeTableSeeder::class);
        $this->call(UporabnikiSeeder::class);
        $this->call(AktivnostTableSeeder::class);
        
        // Newly generated seeders
        $this->call(NadomescanjeTableSeeder::class);
        $this->call(DelovniNalogTableSeeder::class);
        $this->call(DelovniNalogPacientTableSeeder::class);
        $this->call(DelovniNalogZdraviloTableSeeder::class);
        $this->call(ObiskTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(PorociloTableSeeder::class);
    }
}
