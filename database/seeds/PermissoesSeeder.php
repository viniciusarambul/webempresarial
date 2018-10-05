<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Usuarios\Usuario;
use App\Domains\Grupos\Permissoes;

class PermissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissoes::insert([
            ['descricao' => 'Cliente', 'route' => 'dashboard'],
            ['descricao' => 'Cliente', 'route' => 'cliente'],
            ['descricao' => 'Pedido Compra', 'route' => 'pedidoCompra'],
            ['descricao' => 'Pedido Venda', 'route' => 'pedidoVenda'],
        ]);
    }
}
