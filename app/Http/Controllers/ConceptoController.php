<?php

namespace App\Http\Controllers;

use App\Models\Concepto;
use App\Models\Estudio;
use Illuminate\Http\Request;

class ConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Estudio $estudio)
    {
        $estudio->load('conceptos');
        return view('concepto.index', compact('estudio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Estudio $estudio)
    {
        return view('concepto.create', compact('estudio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Estudio $estudio)
    {
        $datos = $request->validate([
            'concepto' => 'required',
        ]);

        $concepto = $estudio->conceptos()->create($datos);

        return redirect()->route('conceptos.index', ['estudio' => $estudio]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudio $estudio, Concepto $concepto)
    {
        return view('concepto.show', ['estudio' => $estudio, 'concepto' => $concepto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudio $estudio, Concepto $concepto)
    {
        $data = $request->validate([
            'concepto' => 'required',
        ]);

        $concepto->update($data);

        return view('concepto.index', ['estudio' => $estudio]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
