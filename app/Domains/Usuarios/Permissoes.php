<?php

namespace App\Domains\Usuarios;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Usuarios\Usuario;

class Permissoes extends Model
{

  protected $table = 'permissoes';

  public static function getPermissoes(Usuario $usuario) {
     return Permissoes::fromQuery("SELECT p.*,CASE WHEN u.usuario_id IS NOT NULL THEN 1 ELSE 0 END AS possui_permissao FROM permissoes p LEFT JOIN usuarios_permissoes u ON u.permissao_id = p.id AND u.usuario_id = ? ORDER BY p.route", [$usuario->id]);
     //return Permissao::fromQuery("SELECT p.*, CASE WHEN u.usuario_id IS NOT NULL THEN 1 ELSE 0 END AS possui_permissao FROM v2_menus p left JOIN v2_usuarios_menus u ON u.menu_id = p.id AND u.usuario_id = ? ORDER BY p.route", [$usuario->id]);
 }
}
