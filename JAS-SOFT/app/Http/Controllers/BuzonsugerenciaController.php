<?php

namespace App\Http\Controllers;

use App\Models\Buzonsugerencia;
use Illuminate\Http\Request;

/**
 * Class BuzonsugerenciaController
 * @package App\Http\Controllers
 */
class BuzonsugerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $buzonsugerencia = Buzonsugerencia::all();
        //dd($buzonsugerencias);
        return view('buzonsugerencia.index')->with('buzonsugerencias', $buzonsugerencia);
    }

    
    public function create()
    {
        return view('buzonsugerencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'CategoriaSugerencia' => 'required',
            'DescripSugerencias' => 'required',
            
            
        ]);

        // Crear un nuevo modelo o utilizar un modelo existente para almacenar los datos en la base de datos

        $insumos = new Buzonsugerencia;
        $insumos->CategoriaSugerencia = $request->input('CategoriaSugerencia');
        $insumos->DescripSugerencias = $request->input('DescripSugerencias');
        $insumos->IdEmpleado = 2;
       
        //dd($insumo);
        $insumos->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('buzonsugerencias.listar')->with('Buzon creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Buzonsugerencia $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $idSugerencias = $request->input('idsugerencias');
        $insumos = Buzonsugerencia::find($idSugerencias);
        //dd($insumos);
        return view('insumo.edit')->with('insumos', $insumos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Buzonsugerencia $buzonsugerencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buzonsugerencia $buzonsugerencia)
    {
        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'CategoriaSugerencia' => 'required',
            'DescripSugerencias' => 'required',
            //'Tamaño' => 'required',
        ]);
        
        $idSugerencias = $request->input('idSugerencias');
        $buzonsugerencia = Buzonsugerencia::find($idSugerencias);
        $buzonsugerencia->CategoriaSugerencia = $request->input('CategoriaSugerencia');
        $buzonsugerencia->DescripSugerencias = $request->input('DescripSugerencias');
        $buzonsugerencia->update();

        return redirect()->route('buzonsugerencias.listar')->with('Buzon actulizado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $idSugerencias = $request->input('idsugerencias');
        $buzonsugerencia = Buzonsugerencia::find($idSugerencias);
        $buzonsugerencia->delete();
        return redirect()->back()->with('Insumo eliminado con exito');

    }
}
