<?php

namespace App\Http\Controllers;

use App\Models\Ordenpedido;
use Illuminate\Http\Request;

/**
 * Class OrdenpedidoController
 * @package App\Http\Controllers
 */
class OrdenpedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenpedidos = Ordenpedido::all();

        return view('ordenpedido.index', compact('ordenpedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordenpedido = new Ordenpedido();
        return view('ordenpedido.create', compact('ordenpedido'));
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
        'NombreInsumo' => 'required',
        'Cantidad' => 'required',
        'Unidadmedida' => 'required',
        'Color' => 'required',
        'Tamaño' => 'required',
        ]);
        
        // Crear un nuevo modelo o utilizar un modelo existente para almacenar los datos en la base de datos
        
<<<<<<< Updated upstream
        $ordenpedido = new Ordenpedido;
        $ordenpedido->fechaProduccion = $request->input('fechaProduccion');
        $ordenpedido->IdOrdenPedido = $request->input('IdOrdenPedido');
        $ordenpedido->IdInsumo = '2';      
        //dd($insumo);
        $ordenpedido->save();

        return redirect()->route('produccion')->with('Orden de produccion creada con');
=======
        $ordenpedidos = new Ordenpedido;
        $ordenpedidos->cantidadProducto = $request->input('cantidadProducto');
        $ordenpedidos->fechaPedido = $request->input('fechaPedido');
        $ordenpedidos->IdOrdenPedido = 2;//$request->input('IdOrdenPedido');
        $ordenpedidos->IdEstadopedido = 2;//$request->input('IdEstadopedido');      
        //dd($ordenpedidos);
        $ordenpedidos->save();

        return redirect()->route('ordenpedido.listar')->with('Orden de produccion creada con exito');
>>>>>>> Stashed changes
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordenpedido = Ordenpedido::find($id);

        return view('ordenpedido.edit', compact('ordenpedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ordenpedido $ordenpedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordenpedido $ordenpedido)
    {
<<<<<<< Updated upstream
        request()->validate(Ordenpedido::$rules);
=======
        $validatedData = $request->validate([
            'cantidadProducto' => 'required',                  
            'IdEstadopedido' => 'required',        
        ]);
        
        $idordenpedido = $request->input('idordenpedido');
        $ordenpedidos = Ordenpedido::find($idordenpedido);
        $ordenpedidos->cantidadProducto = $request->input('cantidadProducto');        
        $ordenpedidos->IdEstadopedido = $request->input('IdEstadopedido');
        $ordenpedidos->update();
>>>>>>> Stashed changes

        $ordenpedido->update($request->all());

        return redirect()->route('ordenpedido.index')
            ->with('success', 'Ordenpedido actulizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
<<<<<<< Updated upstream
        $ordenpedido = Ordenpedido::find($id)->delete();

        return redirect()->route('ordenpedido.index')
            ->with('success', 'Ordenpedido eliminada correctamente');
=======
        $idordenpedido = $request->input('idordenpedido');        
        $ordenpedidos = Ordenpedido::find($idordenpedido);
        dd($ordenpedidos);
        $ordenpedidos->delete();
        return redirect()->back()->with('pedido eliminado con exito');
>>>>>>> Stashed changes
    }
}
