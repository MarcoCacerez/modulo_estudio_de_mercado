@extends('tema.sidebar')

@section('title', "Ver estudio")

@section('contenido')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear pregunta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('preguntas.store',['estudio'=>$estudio,'encuesta'=>$encuesta]) }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="pregunta" class="block mb-2 text-sm font-medium text-gray-900">
                                Pregunta:
                            </label>
                            <input type="text" id="pregunta" name="pregunta[pregunta]"
                                value="{{ old('pregunta.pregunta') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            @error('pregunta.pregunta')
                                <small>Tienes que ingresar una pregunta</small>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-4 grid-cols-1 gap-4">
                            <div class="mb-6">
                                <label for="respuesta1" class="block mb-2 text-sm font-medium text-gray-900">
                                    Respuesta 1:
                                </label>
                                <input type="text" id="respuesta1" name="respuestas[][respuesta]"
                                    value="{{ old('respuestas.0.respuesta') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                @error('respuestas.0.respuesta')
                                    <small>Tienes que ingresar una respuesta</small>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="respuesta2" class="block mb-2 text-sm font-medium text-gray-900">
                                    Respuesta 2:
                                </label>
                                <input type="text" id="respuesta2" name="respuestas[][respuesta]"
                                    value="{{ old('respuestas.1.respuesta') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                @error('respuestas.1.respuesta')
                                    <small>Tienes que ingresar una respuesta</small>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="respuesta3" class="block mb-2 text-sm font-medium text-gray-900">
                                    Respuesta 3:
                                </label>
                                <input type="text" id="respuesta3" name="respuestas[][respuesta]"
                                    value="{{ old('respuestas.2.respuesta') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                @error('respuestas.2.respuesta')
                                    <small>Tienes que ingresar una respuesta</small>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="respuesta4" class="block mb-2 text-sm font-medium text-gray-900">
                                    Respuesta 4:
                                </label>
                                <input type="text" id="respuesta4" name="respuestas[][respuesta]"
                                    value="{{ old('respuestas.3.respuesta') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                @error('respuestas.3.respuesta')
                                    <small>Tienes que ingresar una respuesta</small>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endsection
