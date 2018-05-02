<?php

namespace App\Domains\Produtos;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
      public function fornecedorNome(){
        return $this->hasOne('App\Domains\Fornecedores', 'id', 'fornecedor');
      }

}
