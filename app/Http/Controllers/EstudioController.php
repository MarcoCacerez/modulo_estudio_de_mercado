<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudio;

class EstudioController extends Controller
{
    //
    public function create()
    {
        return view('estudio.create');
    }

    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'objetivo' => 'required',
            'objetivos_especificos' => 'required',
            'especificacion' => 'required',
        ]);

        $estudio = auth()->user()->estudios()->create($data);

        return redirect('/dashboard');
    }

    public function show(Estudio $estudio)
    {
        return view('estudio.show', compact('estudio'));
    }

    public function update(Request $request, $id)
    {
        $estudio = Estudio::find($id);
        $input = $request->all();
        //print_r($input);
        $estudio->update($input);
        return redirect('/estudios/'.$estudio->id.'/detalles');
    }

    public function delete($id){
        Estudio::destroy($id);
        return redirect('/dashboard')->with('eliminar', 'ok');
    }
}
