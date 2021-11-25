<?php

use Illuminate\Database\Seeder;
use \App\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create(['name' => 'Principal']);
        Menu::create(['name' => 'Archivos']);
        Menu::create(['name' => 'Configuración']);
    }
}
