<?php

namespace App\Domains\ContasReceber;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Clientes\Cliente;

class ContaReceber extends Model
{
  protected $table = 'contaReceber';
  protected $appends = ['situacao_descricao'];

  public function clientes(){
    return $this->hasOne(Cliente::class, 'id','idCliente');
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
}
