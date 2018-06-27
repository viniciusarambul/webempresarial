<?php

namespace App\Domains\Categorias;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Produtos\Produto;

class Categoria extends Model
{

  protected $table = 'categorias';

  public function produtos(){
    return $this->hasMany(Produto::class, 'id', 'categoria');
  }

}
