<?php

namespace App\Domains\Vendedores;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
  protected $table = 'vendedors';

  public function vendedor(){
    return $this->hasOne(Vendedors::class, 'id','idVendedor');
  }
  public function setCpfAttribute(CPF $cpf){
    $this->cpf = $cpf->get();
  }
  public function setCnpjAttribute(CNPJ $cnpj){
    $this->cnpj = $cnpj->get();
  }
}
