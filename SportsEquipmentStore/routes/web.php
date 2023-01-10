<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/details', [EquipmentsController::class,'show'])->name('details');
Route::get('/home', [EquipmentsController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile', [HomeController::class, 'index'])->name('profile');





// Route::get('/equipments', [EquipmentsController::class,'index']);
// Route::get('/equipments/create', [EquipmentsController::class,'create']);
// Route::get('/details/{id}', [EquipmentsController::class, 'show']);
// Route::post('/equipments', [EquipmentsController::class,'store']);
// Route::delete('/equipments/{id}', [EquipmentsController::class,'destroy']);



Route::get('/', function () {
    return view('welcome');
});

//Route::get('/basket', [EquipmentsController::class, 'store']);

Route::get('/equipments', [EquipmentsController::class, 'index'])->name('equipments.index');
Route::get('/equipments/brand/{id}', [EquipmentsController::class,'edit'])->name('equipments.edit')->middleware('auth');
Route::get('/equipments/edit/{id}', [EquipmentsController::class,'equipmentByBrand'])->name('equipment.by.brand')->middleware('auth');
Route::get('/equipment/search', [EquipmentsController::class, 'search'])->name('equipments.search');
Route::get('/equipments/create', [EquipmentsController::class, 'create'])->name('equipments.create')->middleware('auth');
Route::post('/equipments', [EquipmentsController::class, 'store'])->name('equipments.store')->middleware('auth');
Route::get('/equipments/{id}', [EquipmentsController::class, 'show'])->name('equipments.show');
Route::put('/equipments/{id}', [EquipmentsController::class, 'update'])->name('equipments.update')->middleware('auth');
Route::delete('/equipments/{id}', [EquipmentsController::class, 'destroy'])->name('equipments.destroy')->middleware('auth');


///basketController
Route::get('/basket', [BasketsController::class, 'show'])->name('basket.show')->middleware('auth');
Route::post('/basket', [BasketsController::class,'store'])->name('basket.store')->middleware('auth');
Route::get('/basket', [BasketsController::class,'addToBasket'])->name('basket.addToBasket')->middleware('auth');
Route::delete('/basket/{id}', [BasketsController::class, 'destroy'])->name('basket.destroy')->middleware('auth');


Route::get('/basket', [BasketsController::class,'index']);
Route::get('/basket/addToBasket', [BasketsController::class,'addToBasket']);
Route::post('/basket', [BasketsController::class,'store']);
Route::delete('/basket/{id}', [BasketsController::class,'destroy']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


