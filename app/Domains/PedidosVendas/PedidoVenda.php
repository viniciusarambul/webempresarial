<?php

namespace App\Domains\PedidosVendas;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Pedidos\Pedidoitem;
use App\Domains\Vendedores\Vendedor;

class PedidoVenda extends Model
{
  protected $table = 'pedidoVenda';
  protected $appends = ['situacao_descricao'];

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
    return $this->hasMany(Pedidoitem::class, 'idPedido', 'id')->where('tipo_pedido', 'VENDA');
  }

  public function titulos(){
    return $this->hasOne(Pedidotitulo::class, 'idPedido', 'id');
  }

  public function vendedores(){
    return $this->hasMany(Vendedor::class, 'idVendedor', 'id');
  }
}
