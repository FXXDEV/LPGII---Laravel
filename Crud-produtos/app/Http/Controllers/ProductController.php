<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();

        return view('products/index', ['products' => $products]);
    }

    public function create() 
    {
        return view('products/new');
    }

    public function store(Request $request) 
    {
        $p = new Product;
        $p->nome = $request->input('nome');
        $p->valor = $request->input('valor');
        
        if ($p->save()) {
            \Session::flash('status', 'Produto criado com sucesso.');
            return redirect('/products');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o produto.');
            return view('products.new');
        }
    }

    public function edit($id) {
        $product = Product::findOrFail($id);

        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id) {
        $p = Product::findOrFail($id);
        $p->nome = $request->input('nome');
        $p->valor = $request->input('valor');
        
        if ($p->save()) {
            \Session::flash('status', 'Produto atualizado com sucesso.');
            return redirect('/products');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o produto.');
            return view('products.edit', ['product' => $p]);
        }
    }

    public function destroy($id) {
        $p = Product::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Produto excluído com sucesso.');
        return redirect('/products');
    }
}
