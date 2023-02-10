@extends('tema.sidebar')

@section('title', "Ver estudio")

@section('contenido')

<x-app-layout>
    <x-slot name="header">
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <h2 class="flex items-center">
                    Detalles del estudio
                </h2>
            </div>
        </nav>
    </x-slot>
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <form action="{{ route('estudios.update',['estudio'=>$estudio]) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="mb-6">
                                <label for="nombre" class="block mb-2 font-bold text-lg text-gray-900">Nombre del estudio</label>
                                <input type="text" value="{{ $estudio->nombre }}" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('nombre')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="objetivo" class="block mb-2 text-lg font-bold text-gray-900">Objetivo</label>
                                <textarea name="objetivo" id="objetivo" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Ingrese el objetivo del estudio de mercado">{{ $estudio->objetivo }}</textarea>
                                @error('objetivo')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="objetivos_especificos" class="block mb-2 text-lg font-bold text-gray-900">Objetivos especificos</label>
                                <textarea name="objetivos_especificos" id="objetivos_especificos" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Ingrese el objetivo del estudio de mercado">{{ $estudio->objetivos_especificos }}</textarea>
                                @error('objetivo')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="especificacion" class="block mb-2 text-lg font-bold text-gray-900">Especificación de mercado</label>
                                <textarea name="especificacion" id="especificacion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Ingrese el objetivo del estudio de mercado">{{ $estudio->especificacion }}</textarea>
                                @error('objetivo')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
@endsection
