@extends('tema.sidebar')

@section('title', $concepto->concepto)

@section('contenido')

    <x-app-layout>
        <x-slot name="header">
            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <h2 class="flex items-center">
                        {{ $estudio->nombre }}
                    </h2>
                    <div class="flex md:order-2">
                        <a href="*"
                            class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 text-center mr-3 md:mr-0">
                            Editar concepto
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
                            <div>
                                <h2>
                                    {{ $concepto->concepto }}
                                </h2>
                                <div>
                                    {{ $concepto->conclusion }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
@endsection
