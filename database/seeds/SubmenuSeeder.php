<?php

use Illuminate\Database\Seeder;
use \App\Submenu;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Submenu::create(['id_menu'=> '3','name' => 'Ejecutivos']);
        Submenu::create(['id_menu'=> '3','name' => 'Imagenes']);
        Submenu::create(['id_menu'=> '3','name' => 'SGR']);
        Submenu::create(['id_menu'=> '3','name' => 'IVA']);

        Submenu::create(['id_menu'=> '3','name' => 'Paises']);
        Submenu::create(['id_menu'=> '3','name' => 'Monedas']);
        Submenu::create(['id_menu'=> '3','name' => 'Uso plataforma']);
        Submenu::create(['id_menu'=> '3','name' => 'Notarias']);
        Submenu::create(['id_menu'=> '3','name' => 'Submnenus']);
        Submenu::create(['id_menu'=> '3','name' => 'Submenus Actions']);
        Submenu::create(['id_menu'=> '3','name' => 'Carga Masiva Proyectos']);
    }
}
