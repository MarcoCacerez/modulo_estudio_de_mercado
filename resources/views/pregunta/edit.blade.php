@extends('tema.sidebar')

@section('title', "Ver estudio")

@section('contenido')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar pregunta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('preguntas.update',['estudio'=>$estudio,'encuesta'=>$encuesta,'pregunta'=>$pregunta]) }}" method="post">
                        @method('PATCH') 
                        @csrf
                        <div class="mb-6">
                            <label for="pregunta" class="block mb-2 text-sm font-medium text-gray-900">
                                Pregunta:
                            </label>
                            <input type="text" id="pregunta" name="pregunta[pregunta]"
                                value="{{ $pregunta->pregunta }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            @error('pregunta.pregunta')
                                <small>Tienes que ingresar una pregunta</small>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-4 grid-cols-1 gap-4">
                            @foreach ($pregunta->respuestas as $respuesta )
                                <div class="mb-6">
                                    <label for="respuesta1" class="block mb-2 text-sm font-medium text-gray-900">
                                        Respuesta 1:
                                    </label>
                                    <input type="text" id="respuesta1" name="respuestas[][respuesta]"
                                        value="{{ $respuesta->respuesta }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        required>
                                    @error('respuestas.0.respuesta')
                                        <small>Tienes que ingresar una respuesta</small>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endsection
