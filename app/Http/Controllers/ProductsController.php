<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class ProductsController extends Controller
{   
    //Função para Listar os produtos
    public function index(){
        
        $products = Product::all();
        //dd($products);

        return response()->json(['products' => $products], 200);
    }

    //Função para Cadastrar os produtos
    public function store(Request $request){

        $request->merge(['price' => str_replace(',', '.', $request->get('price'))]); //substitui a virgula de price antes de validar.

        $request->validate([
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer',
            'id_category'   => 'required|integer',
            'image'         => 'nullable|string',
        ]);
        
        $product = new Product([
            'description'   => $request->get('description'),
            'price'         => $request->get('price'),
            'quantity'      => $request->get('quantity'),
            'id_category'   => $request->get('id_category'),
            'image'         => $request->get('image'),
            'datecad'       => now(),
        ]);
    
        $product->save();
    
        return response()->json(['success' => true, 'message' => 'Produto inserido com sucesso!']);
    }

    //Função para Alterar os produtos
    public function update(Request $request){

        $request->merge(['price' => str_replace(',', '.', $request->get('price'))]); //substitui a virgula de price antes de validar.

        $request->validate([
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'quantity'      => 'required|integer',
            'id_category'   => 'required|integer',
            'image'         => 'nullable|string',
        ]);

        $product = Product::find($request->get('id'));

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Falha ao encontrar o Produto!']);
        }

        $product->update([
            'description'   => $request->get('description'),
            'price'         => $request->get('price'),
            'quantity'      => $request->get('quantity'),
            'id_category'   => $request->get('id_category'),
            'image'         => $request->get('image'),
        ]);

        return response()->json(['success' => true, 'message' => 'Produto alterado com sucesso!']);
    }

    //Função para Deletar os produtos
    public function destroy($id)
    {
        //$product = Product::find($request->get('id'));
        $product = Product::find($id);
        
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Falha ao encontrar o Produto!']);
        }

        $product->delete();

        return response()->json(['success' => true, 'message' => 'Produto deletado com sucesso!']);
    }

}
