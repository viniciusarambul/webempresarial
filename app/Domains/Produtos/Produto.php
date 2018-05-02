<?php

namespace App\Domains\Produtos;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
      public function fornecedor(){
        return $this->hasOne('App\Fornecedor', 'id', 'fornecedor');
      }

}
