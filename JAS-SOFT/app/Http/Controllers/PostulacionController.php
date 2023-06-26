<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function index()
    {
        $postulaciones = Postulacion::all();

        return view('postulacion.index')->with('postulaciones', $postulaciones);
    }

    public function create()
    {
        

    return view('postulacion.create');
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'FechaPostulacion' => 'required',
            'DescripOferta' => 'required',
            'PerfilPostulacion' => 'required',
            'IdDetallesOferta' => 'required',
            'IdEmpleado' => 'required',
            'IdEstadoPostulaciones' => 'required',
        ]);

        $postulacion = new Postulacion;
        $postulacion->FechaPostulacion = $request->input('FechaPostulacion');
        $postulacion->DescripOferta = $request->input('DescripOferta');
        $postulacion->PerfilPostulacion = $request->input('PerfilPostulacion');
        $postulacion->IdDetallesOferta = $request->input('IdDetallesOferta');
        $postulacion->IdEmpleado = $request->input('IdEmpleado');
        $postulacion->IdEstadoPostulaciones = $request->input('IdEstadoPostulaciones');
        $postulacion->save();

        return redirect()->route('postulacion.index')->with('success', 'Postulacion creada correctamente');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'IdPostulacion' => 'required',
            'FechaPostulacion' => 'required',
            'DescripOferta' => 'required',
            'PerfilPostulacion' => 'required',
        ]);

        $idPostulacion = $request->input('IdPostulacion');
        $postulacion = Postulacion::find($idPostulacion);

        if ($postulacion) {
            $postulacion->FechaPostulacion = $request->input('FechaPostulacion');
            $postulacion->DescripOferta = $request->input('DescripOferta');
            $postulacion->PerfilPostulacion = $request->input('PerfilPostulacion');
            $postulacion->save();

            return redirect()->route('postulacion.listar')->with('success', 'Postulacion actualizada con éxito');
        }

        return redirect()->back()->with('error', 'No se encontró la postulacion');
    }

    public function destroy(Request $request)
    {
        $idPostulacion = $request->input('idpostulacion');
        $postulacion = Postulacion::find($idPostulacion);

        if ($postulacion) {
            $postulacion->delete();
            return redirect()->back()->with('success', 'Postulacion eliminada con éxito');
        }

        return redirect()->back()->with('error', 'No se encontró la postulacion');
    }
}
