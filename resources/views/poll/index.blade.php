@extends('tema.sidebar')

@section('title', "Ver estudio")

@section('contenido')

<x-app-layout>
    <x-slot name="header">
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <h2 class="flex items-center">
                    {{ $estudio->nombre }}
                </h2>
                <div class="flex md:order-2">
                    <a href="{{ route('polls.create',['estudio'=>$estudio]) }}" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0">
                        Crear encuesta
                    </a>
                </div>
            </div>
        </nav>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        @foreach ($estudio->encuestas as $encuesta)
                            <div class="p-6 mb-3 max-w-auto bg-white rounded-lg border border-gray-200 shadow-md">
                                <h6 class="mb-2 font-bold tracking-tight text-gray-800 text-xl">{{ $encuesta->titulo }}</h6>
                                <p class="mb-3 font-normal text-gray-700 text-lg">{{ $encuesta->descripcion }}</p>
                                <a href="{{ route('polls.show',['estudio'=>$estudio,'encuesta'=>$encuesta]) }}" class="inline-flex items-center py-2 px-3 text-sm font-bold text-center text-white bg-blue-500 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Ver mas
                                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
@endsection
