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
    }
}
