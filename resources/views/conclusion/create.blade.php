@extends('tema.sidebar')

@section('title', "Ver estudio")

@section('contenido')

<x-app-layout>
    <x-slot name="header">
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <h2 class="flex items-center">
                    Conclusión
                </h2>
                <div class="flex md:order-2">
                    <a href="#" id="btn_editar" class="text-white text-base bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center mr-3 md:mr-0">
                        ...
                    </a>
                </div>
            </div>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('conclusion.store',['estudio'=>$estudio]) }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="conclusion" class="block mb-2 text-sm font-medium text-gray-900"></label>
                            <textarea name="conclusion" id="conclusion" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ingrese la conclusión del estudio a la que se llegó tras hacer las investigaciones"></textarea>
                            @error('conclusion')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

@endsection
