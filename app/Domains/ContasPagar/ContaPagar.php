<?php

namespace App\Domains\ContasPagar;

use Illuminate\Database\Eloquent\Model;

class ContaPagar extends Model
{
  protected $table = 'contaPagar';

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
