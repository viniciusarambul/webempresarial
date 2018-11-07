<?php

namespace App\Domains\Clientes;
use App\Domains\Core\Types\CPF;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  public function setCpfAttribute(CPF $cpf){
    $this->cpf = $cpf->get();
  }
}
