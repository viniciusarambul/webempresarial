<?php

namespace App\Domain\Core\Util;

class Permission {
  private $items = null;
  private $routes = null;
  private static $instanceObj = null;
  private $ignore_name = ['CriarPergunta', 'SalvarPergunta', 'SalvarFiltroPesquisa', 'VerPergunta', 'SalvarPossivelResposta', 'EnviarMensagemAluno', 'SalvarCorrecao'];

  public static function instance() {
      if (!static::$instanceObj) {
          static::$instanceObj = new self;
      }

      return static::$instanceObj;
  }

  private function __construct() {
    $this->items = collect([
        'home' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-home',
            'description' => 'Página Inicial',
            'url' => '/',
            'allow_to' => [1, 3, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 3, 4]]
            ]
        ],
        'alunos' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-account',
            'description' => 'Alunos',
            'url' => '/alunos',
            'allow_to' => [1, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 4]],
                'show' => ['allow_to' => [1, 4]],
                'resetar_senha' => ['allow_to' => [1, 4]],
                'relatorio_aluno_por_escola' => ['allow_to' => [1]]
            ]
        ],
        'cursos' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-book-open-page-variant',
            'description' => 'Cursos',
            'url' => '/cursos',
            'allow_to' => [1, 3, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 3, 4]]
            ]
        ],
        'estagios' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]]
            ]
        ],
        'unidades' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]]
            ]
        ],
        'licoes' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'create' => ['allow_to' => [1, 3, 4]],
                'edit' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]]
            ]
        ],
        'licoes.respostas' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]],
                'create' => ['allow_to' => [1, 3, 4]],
                'edit' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]]
            ]
        ],
        'unidades.curiosidades' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]],
                'destroy' => ['allow_to' => [1]]
            ]
        ],
        'unidades.grammar-hint' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]],
                'destroy' => ['allow_to' => [1]]
            ]
        ],
        'unidades.audios' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]],
                'destroy' => ['allow_to' => [1]]
            ]
        ],
        'unidades.videos' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]]
            ]
        ],
        'unidades.culture' => [
            'show_on_menu' => false,
            'allow_to' => [1, 3, 4],
            'routes' => [
                'show' => ['allow_to' => [1, 3, 4]],
                'destroy' => ['allow_to' => [1]],
                'store' => ['allow_to' => [1]]
            ]
        ],
        'books' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-book-multiple',
            'description' => 'Books',
            'url' => '/books',
            'allow_to' => [1, 3, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 3, 4]],
                //'visualizar' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]],
            ]
        ],
        'materiais' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-paperclip',
            'description' => 'Materiais Complementares',
            'url' => '/materiais',
            'allow_to' => [1, 3, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 3, 4]],
                'create' => ['allow_to' => [1, 3, 4]],
                'edit' => ['allow_to' => [1, 3, 4]],
                'download' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]],
            ]
        ],
        'avatares' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-face',
            'description' => 'Avatares',
            'url' => '/avatares',
            'allow_to' => [1, 3, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 3, 4]],
                'create' => ['allow_to' => [1, 3, 4]],
                'edit' => ['allow_to' => [1, 3, 4]],
                'store' => ['allow_to' => [1]],
            ]
        ],
        'pesquisas' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-magnify',
            'description' => 'Pesquisas',
            'url' => '/pesquisas',
            'allow_to' => [1],
            'routes' => [
                'index' => ['allow_to' => [1]],
                'show' => ['allow_to' => [1]],
                'detail' => ['allow_to' => [1]],
                'store' => ['allow_to' => [1]],
                'destroy' => ['allow_to' => [1]]
            ]
        ],
        'anuncios' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-link',
            'description' => 'Anúncios',
            'url' => '/anuncios',
            'allow_to' => [1],
            'routes' => [
                'index' => ['allow_to' => [1]],
                'show' => ['allow_to' => [1]],
                'store' => ['allow_to' => [1]],
                'create' => ['allow_to' => [1]]
            ]
        ],
        'mensagens' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-message-text',
            'description' => 'Mensagens',
            'url' => '/mensagens',
            'allow_to' => [3],
            'routes' => [
                'index' => ['allow_to' => [3]]
            ]
        ],
        'atividades' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-pen',
            'description' => 'Atividades para corrigir',
            'url' => '/atividades',
            'allow_to' => [3],
            'routes' => [
                'index' => ['allow_to' => [3]]
            ]
        ],
        'usuarios' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-account',
            'description' => 'Usuários',
            'url' => '/usuarios',
            'allow_to' => [1],
            'routes' => [
                'index' => ['allow_to' => [1]],
                'create' => ['allow_to' => [1]],
                'edit' => ['allow_to' => [1]],
                'download' => ['allow_to' => [1]],
                'store' => ['allow_to' => [1]],
            ]
        ],
        'configuracoes' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-settings',
            'description' => 'Configurações',
            'url' => '/configuracoes',
            'allow_to' => [1],
            'routes' => [
                'index' => ['allow_to' => [1]],
                'create' => ['allow_to' => [1]],
                'edit' => ['allow_to' => [1]],
                'download' => ['allow_to' => [1]],
                'store' => ['allow_to' => [1]],
            ]
        ],
        'manuais' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-help',
            'description' => 'Manuais',
            'url' => '/manuais',
            'allow_to' => [1, 3, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 3, 4]],
                'show' => ['allow_to' => [1, 3, 4]],
                'create' => ['allow_to' => [1]],
                'edit' => ['allow_to' => [1]],
                'store' => ['allow_to' => [1]],
                'destroy' => ['allow_to' => [1]],
            ]
        ],
        'logout' => [
            'show_on_menu' => true,
            'icon' => 'mdi mdi-power',
            'description' => 'Sair',
            'url' => '/logout',
            'allow_to' => [1, 3, 4],
            'routes' => [
                'index' => ['allow_to' => [1, 3, 4]]
            ]
        ],
        'sincronizacao' => [
            'show_on_menu' => false,
            'allow_to' => [1],
        ],
        'sincronizacao_wweb' => [
            'show_on_menu' => false,
            'allow_to' => [1],
        ],
    ]);

    $this->items->each(function($route, $routeName) {
        $this->routes[$routeName] = $route['allow_to'];

        if(isset($route['routes']) && !empty($route['routes'])) {
            foreach($route['routes'] as $childrenName => $children) {
                $this->routes[$routeName . '.' . $childrenName] = $children['allow_to'];
            }
        }
    });
  }

  public function getCollection() {
      return $this->items;
  }

  public function getRoutes() {
      return $this->routes;
  }

  public function getItensByProfile($profile) {
      $menu = $this->items->filter(function($item) use($profile) {
          return ( in_array($profile, $item['allow_to']) ? $item : false);
      });

      return $menu;
  }

  private function checkAuthorization($routeName, $profile) {

      if(in_array($routeName, $this->ignore_name) || $routeName == null) {
          return true;
      }

      if(!isset($this->routes[$routeName])) {
          return false;
      }

      return in_array($profile, $this->routes[$routeName]);
  }

  public static function can($routeName, $userProfile) {
      return static::instance()->checkAuthorization($routeName, $userProfile);
  }
}
