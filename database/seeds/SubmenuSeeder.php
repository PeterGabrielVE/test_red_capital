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
        Submenu::create(['id_menu'=> '2','name' => 'Ejecutivos']);
        Submenu::create(['id_menu'=> '2','name' => 'Imagenes']);
        Submenu::create(['id_menu'=> '2','name' => 'SGR']);
        Submenu::create(['id_menu'=> '2','name' => 'IVA']);

        Submenu::create(['id_menu'=> '2','name' => 'Paises']);
        Submenu::create(['id_menu'=> '2','name' => 'Monedas']);
        Submenu::create(['id_menu'=> '2','name' => 'Uso plataforma']);
        Submenu::create(['id_menu'=> '2','name' => 'Notarias']);
        Submenu::create(['id_menu'=> '2','name' => 'Submnenus']);
        Submenu::create(['id_menu'=> '2','name' => 'Submenus Actions']);
        Submenu::create(['id_menu'=> '2','name' => 'Carga Masiva Proyectos']);
    }
}
