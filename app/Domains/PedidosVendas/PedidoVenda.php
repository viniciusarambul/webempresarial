<?php

namespace App\Domains\PedidosVendas;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Vendedores\Vendedor;

class PedidoVenda extends Model
{
  protected $table = 'pedidoVenda';

  public function itens(){
    return $this->hasMany(Pedidoitem::class, 'idPedido', 'id')->where('tipo_pedido', 'VENDA');
  }

  public function vendedores(){
    return $this->hasMany(Vendedor::class, 'idVendedor', 'id');
  }
}
