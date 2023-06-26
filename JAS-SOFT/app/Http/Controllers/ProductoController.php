<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        //dd($productos)
        return view('producto.index')->with('productos', $productos);
    }

    public function pdf()
    {
        $productos = Producto::all();
        $pdf = PDF::loadView('producto.pdf', ['productos' => $productos]);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        // Validar los datos recibidos del formulario
        
        $validatedData = $request->validate([
            'cantidadproducto' => 'required',
            'valorunidadmedidaproducto' => 'required',
            'fechafabricacion' => 'required',
            'idcolor' => 'required',
            'idempleado' => 'required',            
            'idestadoproducto' => 'required',
            'idnombreproducto' => 'required',
        ]);
        //dd('productos');
        // Crear un nuevo modelo o utilizar un modelo existente para almacenar los datos en la base de datos

        $productos = new Producto;
        $productos->CantidadProducto = $request->input('cantidadproducto');
        $productos->ValorUnidadMedidaProducto = $request->input('valorunidadmedidaproducto');
        $productos->FechaFabricacion = $request->input('fechafabricacion');
        $productos->IdColor = $request->input('idcolor');
        $productos->IdEmpleado = $request->input('idempleado');
        $productos->IdUnidadMedida = $request->input('valorunidadmedidaproducto');
        $productos->IdEstadoProducto = $request->input('idestadoproducto');
        $productos->IdNombreProducto = $request->input('idnombreproducto');
        //dd($producto);
        $productos->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('producto.listar')->with('producto creado con exito');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Request $request)
    {
        $idproducto = $request->input('idproducto');
        $productos = Producto::find($idproducto);
        return view('producto.edit')->with('productos', $productos);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Producto $productos)
    {
        // Validar los datos recibidos del formulario

        $validatedData = $request->validate([
            'cantidadproducto' => 'required',
            'idcolor' => 'required',
            "idestadoproducto" => 'required',
        ]);

        // Crear un nuevo modelo o utilizar un modelo existente para almacenar los datos en la base de datos

        $idproducto = $request->input('idproducto');
        //dd($idproducto);     
        $productos = Producto::find($idproducto);
        $productos->CantidadProducto = $request->input('cantidadproducto');
        $productos->IdColor = $request->input('idcolor');
        $productos->IdEstadoProducto = $request->input('idestadoproducto');
        //dd($productos);
        $productos->update();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('producto.listar')->with('producto actualizado con exito');
    }

    /**
     */
    public function destroy(Request $request)
    {
        $idproducto = $request->input('idproducto');
        $productos = Producto::find($idproducto);
        $productos->delete();

        return redirect()->back()->with('success', 'Producto deleted successfully');
    }
}