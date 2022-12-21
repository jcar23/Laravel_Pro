<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/produtos', [ProdutosController::class,'index']);
Route::get('/produtos/create', [ProdutosController::class,'create']);
Route::get('/detalhes/{id}', [ProdutosController::class,'show']);
Route::post('/produtos', [ProdutosController::class,'store']);
Route::delete('/produtos/{id}', [ProdutosController::class,'destroy']);


// Route::get('/produtos', function ()
// {
//     $arrayProdutos = [
//         ["id" => 1, "nome" => "pc gamer", "desc" => "pc gamer top", "img" => "/img/produtos/1.jpg", "preco" => 1000],
//         ["id" => 2, "nome" => "pc workstation", "desc" => "pc para trabalho", "img" => "/img/produtos/2.jpg", "preco" => 600],
//         ["id" => 3, "nome" => "pc bonzinho", "desc" => "pc bonzinho, desenrasca", "img" => "/img/produtos/3.jpg", "preco" => 400],
//         ["id" => 4, "nome" => "pc rasca", "desc" => "pc mesmo muito fraco", "img" => "/img/produtos/4.jpg", "preco" => 250],
//     ];

//     return view('produtos', ['produtos' => $arrayProdutos]);
// });

// Route::get('/produtos/{id}', function ()
// {
//     $prodId = request('id');

//     $arrayProdutos = [
//         ["id" => 1, "nome" => "pc gamer", "desc" => "pc gamer top", "img" => "/img/produtos/1.jpg", "preco" => 1000],
//         ["id" => 2, "nome" => "pc workstation", "desc" => "pc para trabalho", "img" => "/img/produtos/2.jpg", "preco" => 600],
//         ["id" => 3, "nome" => "pc bonzinho", "desc" => "pc bonzinho, desenrasca", "img" => "/img/produtos/3.jpg", "preco" => 400],
//         ["id" => 4, "nome" => "pc rasca", "desc" => "pc mesmo muito fraco", "img" => "/img/produtos/4.jpg", "preco" => 250],
//     ];

//     $produtoSelecionado =  NULL;
//     foreach($arrayProdutos as $linhaProduto){
//         if($linhaProduto['id'] == $prodId){
//             $produtoSelecionado = $linhaProduto;
//             break;
//         }
//     }
//     return view('detalhes', ['produto' => $produtoSelecionado]);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos.index');
Route::get('/produtos/tipo/{id}', [ProdutosController::class,'edit'])->name('produtos.edit')->middleware('auth');
Route::get('/produtos/edit/{id}', [ProdutosController::class,'produtosPorTipo'])->name('products.by.tipo')->middleware('auth');
Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('produtos.create')->middleware('auth');
Route::post('/produtos', [ProdutosController::class, 'store'])->name('produtos.store')->middleware('auth');
Route::get('/produtos/{id}', [ProdutosController::class, 'show'])->name('produtos.show');
Route::put('/produtos/{id}', [ProdutosController::class, 'update'])->name('produtos.update')->middleware('auth');
Route::delete('/produtos/{id}', [ProdutosController::class, 'destroy'])->name('produtos.destroy')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
