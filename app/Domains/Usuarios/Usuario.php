<?php

namespace App\Domains\Usuarios;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Domains\Usuarios\Permissoes;

class Usuario extends Authenticatable
{
  use Notifiable;

  protected $table = 'usuarios';
  private $permissoes = null;

  public function permissoes() {
        if(null === $this->permissoes) {
            $this->permissoes = Permissoes::fromQuery("SELECT p.* FROM permissoes p INNER JOIN usuarios_permissoes u ON u.permissao_id = p.id AND u.usuario_id = ? ORDER BY p.route", [$this->id]);
        }

        return $this->permissoes;
    }

  public function can($route, $parameters = []) {

        $permissoes = $this->permissoes();

        if(!$permissoes) {
            return false;
        }

        return $permissoes->contains('route', $route);
    }
}
