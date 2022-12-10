@extends('tema.sidebar')

@section('title', "Listado de estudios")

@section('contenido')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight m-3">
            {{ $encuesta->titulo }}
        </h2>
        <a href="{{ route('preguntas.create',['estudio'=>$estudio,'encuesta'=>$encuesta])  }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded text-base">
                Crear pregunta
            </button>
        </a>
        <a href="{{ route('formulario.show',['estudio'=>$estudio,'encuesta'=>$encuesta,'slug'=>Str::slug($encuesta->titulo)]) }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded text-base">
                Contestar encuesta
            </button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="contenedor">
                    @foreach ($encuesta->preguntas as $pregunta )
                        <div class="mb-6">
                            <div class="flex flex-col md:flex-row">
                                <div>
                                    <h1 class="mb-4 mr-2 font-semibold text-gray-900 text-xl">{{ $pregunta->pregunta }}</h1>
                                </div>
                                <div class="flex flex-row mb-6">
                                    <div>
                                        <a href="{{ route('preguntas.edit',['estudio'=>$estudio,'encuesta'=>$encuesta,'pregunta'=>$pregunta]) }}" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Editar</a>
                                    </div>
                                    <div>
                                        <form class="eliminar" action="{{ route('preguntas.delete',['estudio'=>$estudio,'encuesta'=>$encuesta,'pregunta'=>$pregunta]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" id="btn_eliminar" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex">
                                @foreach ($pregunta->respuestas as $respuesta )
                                    <li class="w-full border-b border-gray-200 text-center sm:border-b-0 sm:border-r py-2">
                                        {{ $respuesta->respuesta }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'Tu elemento ha sido borrado!',
                'success'
            )
        </script>
    @endif

    <script>
    let form = document.querySelectorAll(".eliminar");
    for(let i=0; i<form.length; i++){
        form[i].addEventListener('submit', function (event) {
	    event.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form[i].submit();
                }
            })
        });
    };
    </script>
@endsection
