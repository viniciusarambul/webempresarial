<?php

namespace App\Domains\Fornecedores;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Produtos\Produto;


class Fornecedor extends Model
{
  protected $table = 'fornecedores';

  public function produto(){
    return $this->hasMany(Produto::class, 'fornecedor', 'id');
  }

  public function fornecedor(){
    return $this->hasOne(Fornecedor::class, 'id','fornecedor');
  }

}
