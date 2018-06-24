<?php

namespace App\Domains\Pedidos;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Produtos\Produto;


class Pedidoitem extends Model
{
  protected $table = "pedidoitens";

  protected $appends = ['total'];

  public function produto(){
    return $this->hasOne(Produto::class, 'id','idProduto');
  }
  public function getTotalAttribute(){
    return $this->preco*$this->quantidade;
  }
}
