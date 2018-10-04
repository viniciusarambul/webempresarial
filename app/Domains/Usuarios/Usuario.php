<?php

namespace App\Domains\Usuarios;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
  use Notifiable;

  protected $table = 'usuarios';

}
