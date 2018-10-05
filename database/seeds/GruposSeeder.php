<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Usuarios\Usuario;
use App\Domains\Grupos\Grupo;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::insert([
            ['descricao' => 'Administrador'],
            ['descricao' => 'Estoque'],
            ['descricao' => 'Comercial'],
            ['descricao' => 'Atendente'],
        ]);
    }
}
