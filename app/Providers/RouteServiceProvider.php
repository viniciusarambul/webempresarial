<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Domains';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::model('produto', \App\Domains\Produtos\Produto::class);
        Route::model('cliente', \App\Domains\Clientes\Cliente::class);
        Route::model('vendedore', \App\Domains\Vendedores\Vendedor::class);
        Route::model('fornecedore', \App\Domains\Fornecedores\Fornecedor::class);
        Route::model('pedidosCompra', \App\Domains\PedidosCompras\PedidoCompra::class);
        Route::model('pedidoItem', \App\Domains\PedidosCompras\PedidoItemCompra::class);
        Route::model('pedidoTituloCompra', \App\Domains\PedidosCompras\PedidoTituloCompra::class);
        Route::model('pedidosVenda', \App\Domains\PedidosVendas\PedidoVenda::class);
        Route::model('pedidoItem', \App\Domains\PedidosVendas\PedidoItemVenda::class);
        Route::model('pedidoTituloVenda', \App\Domains\PedidosVendas\PedidoTituloVenda::class);
        Route::model('contasReceber', \App\Domains\ContasReceber\ContaReceber::class);
        Route::model('contasPagar', \App\Domains\ContasPagar\ContaPagar::class);
        Route::model('categoria', \App\Domains\Categorias\Categoria::class);

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
