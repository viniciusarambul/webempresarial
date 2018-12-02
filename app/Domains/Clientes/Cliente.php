<?php

namespace App\Domains\Clientes;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use Illuminate\Database\Eloquent\Model;
use App\Domains\ContasReceber\ContaReceber;

class Cliente extends Model
{
//  public function setCpfAttribute(CPF $cpf){
//    $this->cpf = $cpf->get();

//  }
  //public function setCnpjAttribute(CNPJ $cnpj){
  //  $this->cnpj = $cnpj->get();
  //}

  public function receber(){
    return $this->belongsTo(ContaReceber::class, 'idCliente', 'id');
  }
}
