@extends('tema.sidebar')

@section('title', "Ver estudio")

@section('contenido')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear encuesta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('polls.store',['estudio'=>$estudio])  }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900">Título</label>
                            <input type="text" id="titulo" name="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('titulo')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Ingrese la descripcion de la encuesta"></textarea>
                            @error('descripcion')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endsection
