<?php

namespace App\Domains\Categorias;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Produtos\Produto;

class Categoria extends Model
{

  protected $table = 'categorias';

  public function produto(){
    return $this->belongsTo(Produto::class, 'categoria', 'id');
  }
}
