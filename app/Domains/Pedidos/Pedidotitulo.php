<?php

namespace App\Domains\Pedidos;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Produtos\Produto;
use App\Domains\Fornecedores\Fornecedor;


class Pedidotitulo extends Model
{
  protected $table = "pedidotitulos";

  protected $appends = ['total'];

  public function produto(){
    return $this->hasOne(Produto::class, 'id','idProduto');
  }
  public function fornecedor(){
    return $this->hasOne(Fornecedor::class, 'id','idFornecedor');
  }
  public function getTotalAttribute(){
    return $this->preco*$this->quantidade;
  }
}
