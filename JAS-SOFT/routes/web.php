<?php


use App\Models\Insumo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsumoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("index");
});

Route::get('/produccion', function () {
    return view("produccion");
});

/*Route::get('/insumos', function () {
    $insumos = Insumo::all();
    dd($insumos);
    return view('insumo.index')->with('insumos',$insumos);
})->name('Insumo.index');*/

Route::get('/rrhh', function () {
    return view("rrhh");
});

Route::get('/ventas', function () {
    return view("ventas");
});

Route::get('/sales', function () {
    return view("sales");
});

Route::get('/inventario', function () {
    return view("inventario");
});

Route::get('/login', function () {
    return view("login");
});

Route::get('/dashboard', function () {
    return view("dashboard");
});

Route::get('/postulaciones', function () {
    return view("postulaciones");
});

Route::get('/register', function () {
    return view("register");
});

//Route::get('/registerInsumo', function () {
//    return view("/insumo/index");
//});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//route::resource('/insumos', InsumoController::class);

use App\Http\Controllers\RegisterController;

Route::get('/registro', [RegisterController::class, 'create'])->name('registro.formulario');
Route::post('/registro', [RegisterController::class, 'store'])->name('registro.almacenar');
Route::get('/registro/exitoso', function () {
    return "Registro exitoso";
})->name('registro.exitoso');

Route::post('/registerInsumo', [InsumoController::class, 'store'])->name('registerInsumo.almacenar');
Route::get('/insumos', [InsumoController::class, 'index'])->name('insumo.listar');
Route::post('/registerInsumo', [InsumoController::class, 'update'])->name('registerInsumo.update');
