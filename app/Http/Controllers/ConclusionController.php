<?php

namespace App\Http\Controllers;

use App\Models\Conclusion;
use App\Models\Estudio;
use Illuminate\Http\Request;

class ConclusionController extends Controller
{
    //
    public function index(Estudio $estudio)
    {
        return view('conclusion.index', compact('estudio'));
    }

    public function create(Estudio $estudio)
    {
        return view('conclusion.create', compact('estudio'));
    }

    public function store(Estudio $estudio)
    {
        $data = request()->validate([
            'conclusion' => 'required',
        ]);

        $conclusion = $estudio->conclusion()->create($data);

        return redirect('/estudios/' . $estudio->id . '/conclusion/mostrar');
    }

    public function update(Request $request, Estudio $estudio)
    {
        $conclusion = Conclusion::find($estudio->conclusion->id);
        $input = $request->all();
        $conclusion->update($input);
        return redirect('/estudios/' . $estudio->id . '/conclusion/mostrar');
    }
}
