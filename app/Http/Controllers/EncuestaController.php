<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;

class EncuestaController extends Controller
{
    //
    public function create()
    {
        return view('encuesta.create');
    }

    public function store()
    {
        $data = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $encuesta = auth()->user()->encuestas()->create($data);

        return redirect('/encuestas/'.$encuesta->id);
    }

    public function show(Encuesta $encuesta)
    {
        $encuesta->load('preguntas.respuestas');
        return view('encuesta.show',compact('encuesta'));
    }
}
