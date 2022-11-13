@extends('tema.sidebar')

@section('title', 'Ver estudio')

@section('contenido')

    <x-app-layout>
        <x-slot name="header">
            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <h2 class="flex items-center">
                        {{ $estudio->nombre }}
                    </h2>
                    <div class="flex md:order-2">
                        <a href=""
                            class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 text-center mr-3 md:mr-0">
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
                        <form action="{{ route('conceptos.store', ['estudio' => $estudio]) }}" method="post">
                            @csrf
                            <div class="mb-6">
                                <label for="concepto" class="block mb-2 text-sm font-medium text-gray-900">Concepto</label>
                                <input type="text" name="concepto" id="concepto" value="{{ old('concepto') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('concepto')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
@endsection
