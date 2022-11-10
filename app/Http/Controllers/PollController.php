<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudio;
use App\Models\Poll;

class PollController extends Controller
{
    //
    public function index(Estudio $estudio)
    {
        $estudio->load('encuestas');
        return view('poll.index',compact('estudio'));
    }

    public function create(Estudio $estudio)
    {
        return view('poll.create', compact('estudio'));
    }

    public function store(Estudio $estudio)
    {
        $data = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $encuesta = $estudio->encuestas()->create($data);

        return redirect('/estudios/'.$estudio->id.'/encuestas/'.$encuesta->id);
    }

    public function show(Estudio $estudio, Poll $encuesta)
    {
        $encuesta->load('preguntas.respuestas');
        return view('poll.show',compact('estudio', 'encuesta'));
    }

    public function update(){
        
    }
}
