<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Models\Product;
use App\Models\tipo_produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function index(){
        $tipos = tipo_produto::all();
        $produtos = Product:: all();

        return view('produtos', ['produtos' => $produtos, 'tipos'=> $tipos]);

    }
    public function show($id){
            $produto = Product::findOrFail($id);

        return view('detalhes', ['produto' => $produto]);
    }


    public function create(){
        $tipos = tipo_produto::all();

        $user = auth()->user();
        $userProducts = $user -> products;
        if($userProducts -> count() >= env('MAX_PRODUCTS')){
            return redirect('/home')->with('mssg', 'Não de pode criar mais produtos');
        }

        return view('createProduct', ['tipos' => $tipos]);
    }


    public function store(Request $request){

        $validateData = $request->validate([
            'name' => 'required',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $name = request('name');
        $descr = request('descr');
        $tipo = request('');
        $price = request('preco');
        $tipo = request('tipoProduto');

        $url = "";
        if($request-> has('url')){
            $image = $request->file('url');

            $iname = 'prod'.'_'.time();
            $folder = '/img/produtos/';
            $fileName = $iname.'.'.$image->getClientOriginalExtension();
            $filePath = $folder . $fileName;

            $image ->storeAs($folder, $fileName, 'public');
            $url = "/storage" . $filePath;

        }

        $produto = new Product();

        $produto-> nome = $name;
        $produto-> descr = $descr;
        $produto-> url = $url;
        $produto-> preco = $price;
        $produto-> tipo_produto_id = $tipo;
        $produto-> created_by = auth() -> user() -> id;

        $produto-> save();

        return redirect('/produtos/create')->with('mssg', 'Produto criado');
    }

    public function update($id, EditProductRequest $request){
        $name = request('name');
        $descr = request('descr');
        $price = request('price');
        $tipo = request('tipoProduto');

        $changed =  request('changed')=='true'?1:0;

        $produto = Product::findOrFail($id);

        if($changed == 'true'){
            $url = "";
            if($request-> has('url')){
                $image = $request->file('url');

                $iname = 'prod'.'_'.time();
                $folder = '/img/produtos/';
                $fileName = $iname.'.'.$image->getClientOriginalExtension();
                $filePath = $folder . $fileName;

                $image ->storeAs($folder, $fileName, 'public');
                $url = "/storage" . $filePath;

            }
            $produto->url = $url;
        }


        $produto-> nome = $name;
        $produto-> descr = $descr;
        $produto-> preco = $price;
        $produto->tipo_produto_id = $tipo;

        $produto-> save();
        return redirect('/produtos/$id')->with('mssg', 'Produto criado');
    }


    public function destroy($id){
        $produto = Product::findOrFail($id);
        $produto -> delete();

        return redirect('/produtos');

    }

    public function edit($id){
        $tipos = tipo_produto::all();
        $produto = Product::findOrFail($id);
        return view ('createProduct', ['produto'=> $produto, 'tipos' => $tipos]);
    }

    public function produtosPorTipo($id){
        $tipos = tipo_produto::all();
        $tipo = tipo_produto::findOrFail($id);
        $produtos = $tipo-> products;

        return view('produtos', ['produtos' => $produtos, 'tipos' =>$tipos, 'actTipo' =>$id]);
    }

}
