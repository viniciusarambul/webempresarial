<?php

namespace App\Domains\PedidosCompras;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Pedidos\Pedidotitulo;

class PedidoCompra extends Model
{
  protected $table = 'pedidoCompra';
  protected $appends = ['situacao_descricao', 'totalpreco'];

  public function getSituacaoDescricaoAttribute(){
    if($this->situacao == 0){
      return "Aberto";
    }
    if($this->situacao == 1){
      return "Fechado";
    }
    if($this->situacao == 2){
      return "Cancelado";
    }
  }

  public function itens(){
    return $this->hasMany(Pedidoitem::class, 'idPedido', 'id')->where('tipo_pedido', 'COMPRA');
  }

  public function titulo(){
    return $this->hasOne(Pedidotitulo::class, 'idPedido', 'id');
  }

  public function getTotalPrecoAttribute(){
    return $this->itens->reduce(function($total, $item){
      return $total+=$item->valorUnitario*$item->quantidade;
    });
  }



}
