<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del formulario
    $validatedData = $request->validate([
        'name' => 'required|max:30',
        'email' => 'required|email',
        'email_verified_at' => 'required|email',
        'contrasena' => 'required',
    ]);

    // Crear un nuevo modelo o utilizar un modelo existente para almacenar los datos en la base de datos
    $usuario = new User;
    $usuario->name = $validatedData['name'];
    $usuario->email = $validatedData['email'];
    $usuario->email_verified_at = $validatedData['email_verified_at'];
    $usuario->contrasena = bcrypt($validatedData['contrasena']);
    $usuario->save();

    // Redirigir a una página de éxito o mostrar un mensaje de éxito
    return redirect()->route('registro.exitoso');
}
}
