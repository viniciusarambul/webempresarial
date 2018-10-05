<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Usuarios\Usuario;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nome'    => 'Vinicius Arambul',
            'email'    => 'vinicius.vieira@hotmail.com',
            'login'    => 'vini',
            'senha'   =>  Hash::make('123456'),
            'grupo_id'   =>  '1',
        ]);
    }
}
