<?php

namespace App\Domains\Core\Util;
use App\Domains\Grupos\Permissoes;
use App\Domains\Grupos\GrupoPermissao;

class Permission {

  public static function can($route) {
      $permissao = Permissoes::where('route', $route)->first();
      $usuarioPermissao = GrupoPermissao::where('permissao_id', $permissao->id)
                                            ->where('grupo_id', auth()->user()->grupo_id)->first();
      return (bool)$usuarioPermissao;
  }
}
