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

    }

    public function edit(Request $request, Ventum $venta)
    {
        // Aquí puedes realizar las operaciones necesarias para obtener la venta con el ID proporcionado
        $venta = Ventum::find($venta->IdVenta);

        // Verificar si se encontró una venta con el ID proporcionado
        if (!$venta) {
            return redirect()->route('ventum.index')->with('error', 'Venta no encontrada');
        }

        // Realiza cualquier otra lógica requerida para la vista de edición

        // Luego, devuelve la vista de edición con la venta
        return view('ventum.index', compact('ventum'));
    }




    public function update(Request $request)
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

        return redirect()->route('ventum.index')->with('success', 'Venta actualizada correctamente');
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