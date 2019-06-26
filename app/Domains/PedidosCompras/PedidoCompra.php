<?php

namespace App\Domains\PedidosCompras;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Pedidos\Pedidotitulo;

class PedidoCompra extends Model
{
  protected $table = 'pedidocompra';
  protected $appends = ['situacao_descricao', 'totalpreco'];

  public function getSituacaoDescricaoAttribute(){
    if($this->situacao == 0){
      return "Aberto";
    }
    if($this->situacao == 1){
      return "Faturado";
    }
    if($this->situacao == 2){
      return "Cancelado";
    }
  }

  public function itens(){
    return $this->hasMany(Pedidoitem::class, 'idPedido', 'id')->where('tipo_pedido', 'COMPRA');
  }

  public function titulo(){
    return $this->hasOne(Pedidotitulo::class, 'idPedido', 'id')->where('tipo_pedido', 'COMPRA');
  }

  public function getTotalPrecoAttribute(){
    return $this->itens->reduce(function($total, $item){
      return $total+=$item->valorUnitario*$item->quantidade;
    });
  }

  public function fornecedores(){
      return $this->hasOne(Fornecedor::class, 'id', 'idFornecedor');

  }



}
