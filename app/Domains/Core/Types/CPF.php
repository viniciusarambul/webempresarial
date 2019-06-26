<?php

namespace App\Domains\Core\Types;
use App\Exceptions\Handler;
use Exception;

class CPF implements TypeInterface{
  private function validator(string $str = null){

    if($str == null){
      return false;
    }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $str), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso

        if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' ||
         $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' ||
         $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' ||
         $cpf == '88888888888' || $cpf == '99999999999') {
          //echo 1;
          return false;
        }
          for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
              $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
              return false;
            }
          }
          //echo 0;
          return true;



  }

    public static function check(string $str){}
    public function get(){
      return $this->value;
    }
    public function getMasked(){
      return $this->value;
    }
    private $value = '';
    public function __construct(string $str = null){
      if(!$this->validator($str)){
        exit('CPF Inválido');

      }

      $this->value = $str;
    }
    function __toString(){
      return $this->value;
    }

}
