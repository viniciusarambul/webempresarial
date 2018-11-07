<?php

namespace App\Domains\Core\Types;

interface TypeInterface{
  public static function check(string $str);
  public function get();
  public function getMasked();

}
