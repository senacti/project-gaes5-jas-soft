<?php

namespace App\Http\Controllers;

use App\Models\Ventum;
use Illuminate\Http\Request;

class VentumController extends Controller
{
    public function index()
    {
        $ventas = Ventum::all();
        return view('ventum.index')->with('ventas', $ventas);
    }

    public function create()
    {
        return view('ventum.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'IdVenta' => 'required',
            'fecha' => 'required',
            'totalventa' => 'required',
            'subTotal' => 'required',
            'CantidadDescuento' => 'required',
            'totalIva' => 'required',
            'IdCliente' => 'required',
            'IdPagos' => 'required',
            'IdEmpleado' => 'required',
            'IdOrdenPedido' => 'required',
        ]);

        $venta = new Ventum;
        $venta->fecha = $request->input('fecha');
        $venta->totalVenta = $request->input('totalventa');
        $venta->subTotal = $request->input('subTotal');
        $venta->CantidadDescuento = $request->input('CantidadDescuento');
        $venta->totalIva = $request->input('totalIva');
        $venta->IdCliente = $request->input('IdCliente');
        $venta->IdPagos = $request->input('IdPagos');
        $venta->IdEmpleado = $request->input('IdEmpleado');
        $venta->IdOrdenPedido = $request->input('IdOrdenPedido');
        $venta->save();

        return redirect()->route('ventum.index')->with('success', 'Venta creada correctamente');
    }

    public function show(Ventum $venta)
    {
        return view('ventum.show', ['venta' => $venta]);
    }

    public function edit($id)
    {
        $venta = Ventum::findOrFail($id);
        return view('ventum.edit', ['venta' => $venta]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha' => 'required',
            'totalventa' => 'required',
            'subTotal' => 'required',
            'CantidadDescuento' => 'required',
            'totalIva' => 'required',
            'IdCliente' => 'required',
            'IdPagos' => 'required',
            'IdEmpleado' => 'required',
            'IdOrdenPedido' => 'required',
        ]);

        $venta = Ventum::findOrFail($id);
        $venta->fecha = $request->input('fecha');
        $venta->totalVenta = $request->input('totalventa');
        $venta->subTotal = $request->input('subTotal');
        $venta->CantidadDescuento = $request->input('CantidadDescuento');
        $venta->totalIva = $request->input('totalIva');
        $venta->IdCliente = $request->input('IdCliente');
        $venta->IdPagos = $request->input('IdPagos');
        $venta->IdEmpleado = $request->input('IdEmpleado');
        $venta->IdOrdenPedido = $request->input('IdOrdenPedido');
        $venta->save();

        return redirect()->route('ventum.index')->with('success', 'Venta actualizada correctamente');
    }

    public function destroy($id)
    {
        $venta = Ventum::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventum.index')->with('success', 'Venta eliminada correctamente');
    }
}
