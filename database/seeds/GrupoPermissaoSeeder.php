<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Usuarios\Usuario;
use App\Domains\Grupos\GrupoPermissao;

class GrupoPermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrupoPermissao::insert([
            ['grupo_id' => '1', 'permissao_id' => '1'],
            ['grupo_id' => '2', 'permissao_id' => '2'],
            ['grupo_id' => '3', 'permissao_id' => '3'],
            ['grupo_id' => '4', 'permissao_id' => '4'],
        ]);
    }
}
