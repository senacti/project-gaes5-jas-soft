<?php

namespace App\Http\Controllers;

use App\Models\Ventum;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VentumController extends Controller
{
    public function index()
    {
        $ventas = Ventum::all();
        return view('ventum.index')->with('ventas', $ventas);
    }
    public function pdf()
    {
        $ventas = Ventum::all();
        $pdf = PDF::loadView('ventum.pdf', ['ventas' => $ventas]);
        return $pdf->stream();
    }

    public function create()
    {
        return view('ventum.create');
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'fecha' => 'required',
        //     'totalVenta' => 'required',
        //     'subTotal' => 'required',
        //     'cantidadDescuento' => 'required',
        //     'totalIva' => 'required',
        //     'IdCliente' => 'required',
        //     'IdPagos' => 'required',
        //     'IdEmpleado' => 'required',
        // ]);

        $venta = new Ventum();
        $venta->fecha = $request->input('fechaVenta');
        $venta->totalVenta = $request->input('totalVenta');
        $venta->subTotal = $request->input('subTotal');
        $venta->cantidadDescuento = $request->input('descuento');
        $venta->totalIva = $request->input('totalIva');
        $venta->IdCliente = $request->input('idcliente');
        $venta->IdPagos = 31;
        $venta->IdEmpleado = $request->input('idempleado');
        $venta->IdOrdenPedido = 10;
        // dd($venta);

        $venta->save();

        return redirect()->route('ventum.listar')->with('Hecho', 'Venta creada correctamente');
    }

    public function show(Ventum $venta)
    {
    }

    public function edit(Request $request)
    {   
        $idventa = $request->input('idventa');
        $venta = Ventum::find($idventa);
        return view('ventum.edit', ['ventas' => $venta]);
    }

    public function vistaedit(Request $request)
    {   
        
        $IdVenta = $request->input('IdVenta');
        $venta = Ventum::find($IdVenta);
        //dd($ventum);
        return view('ventum.edit')->with('ventas', $venta);
    }

    public function update(Request $request)
    {

        // Validar los datos recibidos del formulario
        $validatedData = $request->validate([
            'totalventa' => 'required',
            'subTotal' => 'required',
            'descuento' => 'required',
            'totaliva' => 'required',
        ]);

        $venta = new Ventum();
        $venta->totalVenta = $request->input('totalventa');
        $venta->subTotal = $request->input('subTotal');
        $venta->cantidadDescuento = $request->input('descuento');
        $venta->totalIva = $request->input('totaliva');
        $venta->update();

        return redirect()->route('ventum.listar')->with('Venta actualizada con exito');
    }


    public function destroy(Request $request)
    {
        $idventa = $request->input('idventa');
        $venta = Ventum::find($idventa);

        if ($venta) {
            $venta->delete();
            return redirect()->back()->with('success', 'Venta eliminada correctamente');
        }

        return redirect()->back()->with('error', 'No se encontró la venta');
    }
}
