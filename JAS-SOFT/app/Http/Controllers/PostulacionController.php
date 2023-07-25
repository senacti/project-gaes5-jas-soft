<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function index()
    {
        $postulaciones = Postulacion::all();

        return view('postulacion.index')->with('Postulacion', $postulaciones);
    }

    public function create()
    {
        return view('postulacion.create');
    }

    public function store(Request $request)
    {
        /*$validatedData = $request->validate([
            'fechapostulacion' => 'required',
            'descripofertas' => 'required',
            'perfilpostulacion' => 'required',
            'iddetallesoferta' => 'required',
            'idempleado' => 'required',
            'idestadopostulaciones' => 'required',
        ]);*/

        $postulacion = new Postulacion;
        $postulacion->FechaPostulacion = $request->input('fechapostulacion');
        $postulacion->DescripOferta = $request->input('descripoferta');
        $postulacion->PerfilPostulacion = $request->input('perfilpostulacion');
        $postulacion->IdDetallesOferta = 2;
        $postulacion->IdEmpleado = 3;
        $postulacion->IdEstadoPostulaciones = $request->input('idestadopostulaciones');
        //dd($postulacion);
        $postulacion->save();

        return redirect()->route('postulacion.listar')->with('success', 'Postulacion creada correctamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Postulacion $postulacion)
    {

    }
    public function edit(Request $request)
    {
        $idPostulacion = $request->input('idPostulacion');
        //dd($idPostulacion);
        $postulacion = Postulacion::find($idPostulacion);
        return view('postulacion.edit', ['postulacion' => $postulacion]);
    }

    public function vistaedit(Request $request)
    {
        $idPostulacion = $request->input('idPostulacion');
        $postulacion = Postulacion::find($idPostulacion);
        //dd($postulacion);
        return view('postulacion.edit')->with('postulacion', $postulacion);
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'fechapostulacion' => 'required',
            'descripoferta' => 'required',
            'perfilpostulacion' => 'required',
        ]);
        $postulacion = new Postulacion();
        $postulacion->FechaPostulacion = $request->input('fechapostulacion');
        $postulacion->DescripOferta = $request->input('descripoferta');
        $postulacion->PerfilPostulacion = $request->input('perfilpostulacion');
        $postulacion->update();

        return redirect()->back()->with('error', 'No se encontró la postulacion');
    }

    public function destroy(Request $request)
    {
        $idPostulacion = $request->input('idPostulacion');
        $postulacion = Postulacion::find($idPostulacion);

        if ($postulacion) {
            $postulacion->delete();
            return redirect()->back()->with('success', 'Venta eliminada correctamente');
        }

        return redirect()->back()->with('error', 'No se encontró la venta');
    }
}
