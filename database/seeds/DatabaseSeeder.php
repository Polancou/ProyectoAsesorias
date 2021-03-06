php<?php

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
        $coordinador = new \App\Models\Coordinator();
        $coordinador->nombre = 'Coordinador';
        $coordinador->apellido = 'De Prueba';
        $coordinador->licenciatura = 1;
        $coordinador->correo = 'coordinador@uacam.mx';
        $coordinador->password = bcrypt('password');
        $coordinador->save();
    }
}
