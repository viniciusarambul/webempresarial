<?php

namespace App\Domains\ContasReceber;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Clientes\Cliente;
use App\Domains\Vendedores\Vendedor;

class ContaReceber extends Model
{
  protected $table = 'contaReceber';
  protected $appends = ['situacao_descricao'];

  public function clientes(){
    return $this->hasOne(Cliente::class, 'id','idCliente');
  }

  public function vendedores(){
    return $this->hasOne(Vendedor::class, 'id','idVendedor');
  }


  public function getSituacaoDescricaoAttribute(){
    if($this->situacao == 0){
      return "Aberto";
    }
    if($this->situacao == 1){
      return "Baixado";
    }
    if($this->situacao == 2){
      return "Atrasado";
    }
  }

  public function getTipoPagamentoAttribute(){
    if($this->situacao == 0){
      return "Boleto";
    }
    if($this->situacao == 1){
      return "Cartão de Crédito";
    }
    if($this->situacao == 2){
      return "Cartão de Débito";
    }
    if($this->situacao == 3){
      return "Cheque";
    }
    if($this->situacao == 4){
      return "Duplicata";
    }
    if($this->situacao == 5){
      return "Promissória";
    }
    if($this->situacao == 6){
      return "Recibo";
    }
  }
}
