<?php

use App\Http\Controllers\InsumoController;
use App\Http\Controllers\OrdenpedidoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VentumController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/rrhh', function () {
    return view('rrhh');
});

Route::get('/ventas', function () {
    return view('ventas');
});

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/inventario', function () {
    return view('inventario');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/sugerencia', function () {
    return view('sugerencia');
});

Route::get('/agregar', function () {
    return view('agregar');
});

Route::get('/buzon', function () {
    return view('buzon');
});

Route::get('/postulaciones', function () {
    return view('postulaciones');
});

Route::get('/register', function () {
    return view('register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/insumos/pdf', [InsumoController::class, 'pdf'])->name('insumo.pdf');
Route::post('/registerInsumo', [InsumoController::class, 'store'])->name('registerInsumo.almacenar');
Route::get('/insumos', [InsumoController::class, 'index'])->name('insumo.listar');
Route::post('/insumos/editar', [InsumoController::class, 'vistaedit'])->name('insumo.edit');
Route::post('/insumos/eliminar', [InsumoController::class, 'destroy'])->name('insumo.eliminar');
Route::post('/insumos/actualizar', [InsumoController::class, 'update'])->name('insumo.actualizarinsumo');

Route::post('/registerordenpedido', [OrdenpedidoController::class, 'store'])->name('ordenpedido.almacenar');
Route::get('/ordenpedidos', [OrdenpedidoController::class, 'index'])->name('ordenpedido.listar');
Route::post('/ordenpedidos/editar', [OrdenpedidoController::class, 'edit'])->name('ordenpedido.edit');
Route::post('/ordenpedidos/eliminar', [OrdenpedidoController::class, 'destroy'])->name('ordenpedido.eliminar');
Route::post('/ordenpedidos/actualizar', [OrdenpedidoController::class, 'update'])->name('ordenpedido.actualizarordenpedido');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registro', [RegisterController::class, 'create'])->name('registro.formulario');
Route::post('/registro', [RegisterController::class, 'store'])->name('registro.almacenar');
Route::get('/registro/exitoso', function () {
    return "Registro exitoso";
})->name('registro.exitoso');



Route::post('/registerventum', [ventumController::class, 'store'])->name('ventum.almacenar');
Route::get('/ventum', [VentumController::class, 'index'])->name('ventum.listar');
Route::post('/ventum/editar', [VentumController::class, 'edit'])->name('ventum.edit');
Route::post('/ventum/eliminar', [VentumController::class, 'destroy'])->name('ventum.eliminar');
Route::post('/ventum/actualizar', [VentumController::class, 'update'])->name('ventum.actualizarordenpedido');