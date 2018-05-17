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
        Route::model('fornecedore', \App\Domains\Fornecedores\Fornecedor::class);
        Route::model('pedidosCompras', \App\Domains\PedidosCompras\PedidoCompra::class);
        Route::model('pedidosVendas', \App\Domains\PedidosVendas\PedidoVenda::class);
        Route::model('contasReceber', \App\Domains\ContasReceber\ContaReceber::class);
        Route::model('contasPagar', \App\Domains\ContasPagar\ContaPagar::class);
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
