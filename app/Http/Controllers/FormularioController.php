<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;
use App\Models\Poll;
use App\Models\Estudio;

class FormularioController extends Controller
{
    public function show(Estudio $estudio, Poll $encuesta, $slug)
    {
        $encuesta->load('preguntas.respuestas');
        return view('formulario.show', compact('estudio', 'encuesta'));
    }

    public function store(Poll $encuesta)
    {
        $datos = request()->validate([
            'elecciones.*.respuesta_id' => 'required',
            'elecciones.*.pregunta_id' => 'required',
            'formulario.nombre' => 'required',
            'formulario.correo' => 'required',
        ]);
        $formulario = $encuesta->formularios()->create($datos['formulario']);
        $formulario->respuestas()->createMany($datos['elecciones']);

        return 'Thank you!';
    }
}
