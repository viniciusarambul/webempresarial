<?php

namespace App\Domains\Vendedores;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use Illuminate\Database\Eloquent\Model;
use App\Domains\ContasReceber\ContaReceber;

class Vendedor extends Model
{
  protected $table = 'vendedors';

  public function vendedor(){
    return $this->hasOne(Vendedor::class, 'id','idVendedor');
  }
  // public function setCpfAttribute(CPF $cpf){
  //   $this->cpf = $cpf->get();
  // }
  // public function setCnpjAttribute(CNPJ $cnpj){
  //   $this->cnpj = $cnpj->get();
  // }

  public function vendedores(){
    return $this->hasOne(ContaReceber::class, 'idVendedor', 'id');
  }
}
