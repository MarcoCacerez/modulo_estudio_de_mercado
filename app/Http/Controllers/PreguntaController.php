<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;
use App\Models\Estudio;
use App\Models\Poll;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Symfony\Component\Console\Input\Input;

class PreguntaController extends Controller
{
    public function create(Estudio $estudio, Poll $encuesta)
    {
        return view('pregunta.create',compact('estudio','encuesta'));
    }

    public function store(Estudio $estudio, Poll $encuesta)
    {
        $datos = request()->validate([
            'pregunta.pregunta' => 'required',
            'respuestas.*.respuesta' => 'required',
        ]);

        $pregunta = $encuesta->preguntas()->create($datos['pregunta']);
        $pregunta->respuestas()->createMany($datos['respuestas']);

        return redirect('/estudios/'.$estudio->id.'/encuestas/'.$encuesta->id);
    }

    public function edit(Estudio $estudio, Poll $encuesta, Pregunta $pregunta)
    {
        return view('pregunta.edit',compact('estudio','encuesta', 'pregunta'));
    }

    public function update(Estudio $estudio, Poll $encuesta, $id, Request $request)
    {
        $pregunta = Pregunta::find($id);
        $input = $request->input('pregunta');
        $pregunta->update($input);
        
        $i = 0;
        foreach ($pregunta->respuestas as $respuesta){ 
            $respuesta = Respuesta::find($respuesta->id);
            $input_respuesta = $request->input("respuestas.{$i}");

            $respuesta->update($input_respuesta);
            $i++;
        }

        return redirect('/estudios/'.$estudio->id.'/encuestas/'.$encuesta->id);
    }

    public function delete(Estudio $estudio, Poll $encuesta, $id){
        Pregunta::destroy($id);
        return redirect('/estudios/'.$estudio->id.'/encuestas/'.$encuesta->id)->with('eliminar', 'ok');
    }
}
