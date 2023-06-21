<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

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
            'Nombreproducto' => 'required',
            'Cantidad' => 'required',
            'Unidadmedida' => 'required',
            'Color' => 'required',
            //  'Tamaño' => 'required',
        ]);

        // Crear un nuevo modelo o utilizar un modelo existente para almacenar los datos en la base de datos

        $productos = new Producto;
        $productos->CantidadProducto = $request->input('Cantidad');
        $productos->ValorUnidadMedidaProducto = $request->input('Color');
        $productos->FechaFabricacion = $request->input('FechaFabricacion');
        $productos->IdColor = 2;
        $productos->IdEmpleado = 2;
        $productos->IdUnidadMedida = 2;
        $productos->IdEstadoProducto = 2;
        $productos->IdNombreProducto = 2;
        //dd($producto);
        $productos->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('producto.listar')->with('producto creado con');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $productos = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $productos = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$rules);

        $producto->update($request->all());

        return redirect()->route('producto.index')
            ->with('success', 'Producto updated successfully');
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