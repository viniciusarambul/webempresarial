<?php

namespace App\Domains\Vendedores;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
  protected $table = 'vendedors';

  public function vendedor(){
    return $this->hasOne(Vendedors::class, 'id','idVendedor');
  }

}
