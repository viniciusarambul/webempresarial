<?php

namespace App\Domains\Pedidos_compras;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pedido_compraController extends Controller
{
    public function index(Request $request)
    {
      $query = Pedido_compra::query();

        if($request->get('filter')){
            $query->where('nome', 'like', '%' . $request->get('filter') . '%');
        }

        $pedidos_compras = $query->paginate(5);

        return view('pedidos_compras.index', [
          'pedidos_compras' => $pedidos_compras,
          'filter'=> $request->get('filter')
        ]);
    }

    public function create()
    {
        return $this->form(new Pedido_compra());
    }

    public function store(Pedido_compraRequest $request)
    {
        $pedido_compra = new Pedido_compra;

        return $this->save($pedido_compra, $request);
    }

    public function show(Pedido_compra $pedido_compra)
    {
        return view('pedidos_compras.show', [
          'pedido_compra' => $pedido_compra
        ]);
    }

    public function edit(Pedido_compra $pedido_compra)
    {
      return $this->form($pedido_compra);
    }

    public function update(Pedido_compraRequest $request, Pedido_compra $pedido_compra)
    {
      return $this->save($pedido_compra, $request);
    }

    public function destroy(Pedido_compra $pedido_compra)
    {
      $pedido_compra->delete();

      return redirect()->route('pedidos_compras.index');
    }

    private function form(Pedido_compra $pedido_compra) {
        return view('pedidos_compras.form', [
          'pedido_compra' => $pedido_compra
        ]);
    }

    private function save(Pedido_compra $pedido_compra, Pedido_compraRequest $request)
    {
      $pedido_compra->nome = $request->get('nome');
      $pedido_compra->data = $request->get('data');
      $pedido_compra->situacao = $request->get('situacao');
      $pedido_compra->fornecedor = $request->get('fornecedor');
      $pedido_compra->produto = $request->get('produto');

      $pedido_compra->save();

      return redirect()->route('pedidos_compras.show', ['id' => $pedido_compra->id]);
    }
}
