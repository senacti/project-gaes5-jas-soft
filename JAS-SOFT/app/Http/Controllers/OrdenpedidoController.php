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
        $ordenpedidos->IdOrdenPedido = $request->input('IdOrdenPedido');
        $ordenpedidos->IdEstadopedido = $request->input('IdEstadopedido');      
        //dd($ordenpedidos);
        $ordenpedidos->save();

        return redirect()->route('ordenpedido.store')->with('Orden de produccion creada con exito');
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
    public function edit(Ordenpedido $id)
    {
        $ordenpedidos = Ordenpedido::find($id);
        return view('ordenpedido.edit', ['ordenpedido' =>$ordenpedidos]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Ordenpedido $ordenpedidos)
    {
        
        $idordenpedido = $request->input('idordenpedido');
        $ordenpedidos = Ordenpedido::find($idordenpedido);
        $ordenpedidos->cantidadProducto = $request->input('cantidadProducto');
        $ordenpedidos->fechaPedido = $request->input('fechaPedido');
        $ordenpedidos->IdEstadopedido = $request->input('IdEstadopedido');
        $ordenpedidos->update();

        return redirect()->route('ordenpedido.index')->with('success', 'Ordenpedido actulizado correctamente');
    }
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ordenpedidos = Ordenpedido::find($id)->delete();

        return redirect()->route('ordenpedido.index')
            ->with('success', 'Ordenpedido eliminada correctamente');
    }
}
