<?php

namespace App\Domains\PedidosCompras;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Pedidos\Pedidoitem;

class PedidoCompra extends Model
{
  protected $table = 'pedidoCompra';

  public function itens(){
    return $this->hasMany(Pedidoitem::class, 'idPedido', 'id')->where('tipo_pedido', 'COMPRA');
  }


}
