<?php

namespace App\Domains\PedidosVendas;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Vendedores\Vendedor;
use App\Domains\Clientes\Cliente;
use App\Domains\Pedidos\Pedidotitulo;

class PedidoVenda extends Model
{
  protected $table = 'pedidovenda';
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
    return $this->hasMany(Pedidoitem::class, 'idPedido', 'id')->where('tipo_pedido', 'VENDA');
  }

  public function titulo(){
    return $this->hasOne(Pedidotitulo::class, 'idPedido', 'id')->where('tipo_pedido', 'VENDA');
  }
  public function vendedores(){
    return $this->hasOne(Vendedor::class, 'id', 'idVendedor');
  }

  public function clientes(){
    return $this->hasOne(Cliente::class, 'id', 'idCliente');
  }

  public function getTotalPrecoAttribute(){
    return $this->itens->reduce(function($total, $item){
      return $total+=$item->valorUnitario*$item->quantidade;
    });
  }
}
