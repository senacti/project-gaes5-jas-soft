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
        
        $ordenpedido = new Ordenpedido;
        $ordenpedido->fechaProduccion = $request->input('fechaProduccion');
        $ordenpedido->IdOrdenPedido = $request->input('IdOrdenPedido');
        $ordenpedido->IdInsumo = '2';      
        //dd($insumo);
        $ordenpedido->save();

        return redirect()->route('produccion')->with('Orden de produccion creada con');
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
        request()->validate(Ordenpedido::$rules);

        $ordenpedido->update($request->all());

        return redirect()->route('ordenpedido.index')
            ->with('success', 'Ordenpedido actulizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ordenpedido = Ordenpedido::find($id)->delete();

        return redirect()->route('ordenpedido.index')
            ->with('success', 'Ordenpedido eliminada correctamente');
    }
}
