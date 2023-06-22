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
        $buzonsugerencias = Buzonsugerencia::paginate();

        return view('buzonsugerencia.index', compact('buzonsugerencias'))
            ->with('i', (request()->input('page', 1) - 1) * $buzonsugerencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buzonsugerencia = new Buzonsugerencia();
        return view('buzonsugerencia.create', compact('buzonsugerencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Buzonsugerencia::$rules);

        $buzonsugerencia = Buzonsugerencia::create($request->all());

        return redirect()->route('buzonsugerencias.index')
            ->with('success', 'Buzonsugerencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buzonsugerencia = Buzonsugerencia::find($id);

        return view('buzonsugerencia.show', compact('buzonsugerencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buzonsugerencia = Buzonsugerencia::find($id);

        return view('buzonsugerencia.edit', compact('buzonsugerencia'));
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
        request()->validate(Buzonsugerencia::$rules);

        $buzonsugerencia->update($request->all());

        return redirect()->route('buzonsugerencias.index')
            ->with('success', 'Buzonsugerencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $buzonsugerencia = Buzonsugerencia::find($id)->delete();

        return redirect()->route('buzonsugerencias.index')
            ->with('success', 'Buzonsugerencia deleted successfully');
    }
}
