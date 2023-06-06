<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view("index");
});

Route::get('/insumos', function () {
    return view("insumos");
});

Route::get('/produccion', function () {
    return view("produccion");
});

Route::get('/insumos', function () {
    return view("insumos");
});

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

Route::get('/login', function () {
    return view("login");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\RegisterController;

Route::get('/registro', [RegisterController::class, 'create'])->name('registro.formulario');
Route::post('/registro', [RegisterController::class, 'store'])->name('registro.almacenar');
Route::get('/registro/exitoso', function () {
    return "Registro exitoso";
})->name('registro.exitoso');