<?php

namespace App\Domains\Produtos;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Fornecedores\Fornecedor;

class Produto extends Model
{
  public function fornecedor(){
    return $this->hasOne(Fornecedor::class, 'id','fornecedor');
  }

}
