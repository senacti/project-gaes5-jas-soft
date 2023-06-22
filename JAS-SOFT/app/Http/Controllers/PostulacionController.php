<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $postulaciones = Postulacion::paginate();

    return view('postulacion.index', compact('postulaciones'))
        ->with('i', (request()->input('page', 1) - 1) * $postulaciones->perPage());
}

// ...

public function store(Request $request)
{
    request()->validate(Postulacion::$rules);

    $postulacion = Postulacion::create($request->all());

    return redirect()->route('postulacion.index')
        ->with('success', 'Postulacion created successfully.');
}

// ...

public function update(Request $request, Postulacion $postulacion)
{
    request()->validate(Postulacion::$rules);

    $postulacion->update($request->all());

    return redirect()->route('postulacion.index')
        ->with('success', 'Postulacion updated successfully');
}

// ...

public function destroy($id)
{
    $postulacion = Postulacion::find($id)->delete();

    return redirect()->route('postulacion.index')
        ->with('success', 'Postulacion deleted successfully');
    }
}