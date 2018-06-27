<?php

namespace App\Domains\Produtos;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Fornecedores\Fornecedor;
use App\Domains\Categorias\Categoria;

class Produto extends Model
{
  public function fornecedor(){
    return $this->hasOne(Fornecedor::class, 'id','fornecedor');
  }

  public function categoria(){
    return $this->hasOne(Categoria::class, 'categoria','id');
  }

}
