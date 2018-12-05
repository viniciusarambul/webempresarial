<?php

namespace App\Domains\Fornecedores;
use App\Domains\Core\Types\CPF;
use App\Domains\Core\Types\CNPJ;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Produtos\Produto;
use App\Domains\ContasPagar\ContaPagar;


class Fornecedor extends Model
{
  protected $table = 'fornecedores';

  public function produto(){
    return $this->hasMany(Produto::class, 'fornecedor', 'id');
  }

  public function fornecedor(){
    return $this->hasOne(Fornecedor::class, 'id','fornecedor');
  }

  public function contaPagar(){
    return $this->hasMany(ContaPagar::class, 'idFornecedor', 'id');
  }
  // public function setCpfAttribute(CPF $cpf){
  //   $this->cpf = $cpf->get();
  // }
  // public function setCnpjAttribute(CNPJ $cnpj){
  //   $this->cnpj = $cnpj->get();
  // }
}
