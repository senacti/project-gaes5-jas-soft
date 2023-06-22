<?php

namespace App\Http\Controllers;

use App\Models\Ordenpedido;
use Illuminate\Http\Request;

class OrdenpedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenpedidos = Ordenpedido::all();
        //dd($ordenpedidos);
        return view('ordenpedido.index')->with('ordenpedidos', $ordenpedidos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenpedido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'cantidadProducto' => 'required',
            'fechaPedido' => 'required',
            'IdProducto' => 'required',
            'IdEstadopedido' => 'required',
        ]);

        // Crear un nuevo modelo o utilizar un modelo existente para almacenar los datos en la base de datos

        $ordenpedidos = new Ordenpedido;
        $ordenpedidos->cantidadProducto = $request->input('cantidadProducto');
        $ordenpedidos->fechaPedido = $request->input('fechaPedido');
        $ordenpedidos->IdProducto = $request->input('IdProducto');
        $ordenpedidos->IdEstadopedido = $request->input('IdEstadopedido');
        
        //dd($ordenpedidos);
        $ordenpedidos->save();

        return redirect()->route('ordenpedido.listar')->with('success', 'Orden de producción creada con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show(Ordenpedido $ordenpedidos)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $idordenpedido = $request->input('idordenpedido');
        //dd($ordenpedidos);      
        $ordenpedidos = Ordenpedido::find($idordenpedido);
        //dd($idordenpedido);
        return view('ordenpedido.edit')->with('ordenpedidos', $ordenpedidos);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Ordenpedido $ordenpedidos)
    {

        $validatedData = $request->validate([
            'cantidadproducto' => 'required',
            'idestadopedido' => 'required',
        ]);

        $idordenpedido = $request->input('idordenpedido');       
        $ordenpedidos = Ordenpedido::find($idordenpedido);
        //dd($request->input('cantidadproducto'));
        $ordenpedidos->cantidadProducto = $request->input('cantidadproducto');
        $ordenpedidos->IdEstadopedido = $request->input('idestadopedido');
        $ordenpedidos->update();

        return redirect()->route('ordenpedido.listar')->with('success', 'Ordenpedido actulizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idordenpedido = $request->input('idordenpedido');
        $ordenpedidos = Ordenpedido::find($idordenpedido);
        //dd($ordenpedidos);
        $ordenpedidos->delete();
        return redirect()->back()->with('pedido eliminado con exito');
    }
}