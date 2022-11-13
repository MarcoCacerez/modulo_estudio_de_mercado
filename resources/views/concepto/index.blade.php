@extends('tema.sidebar')

@section('title', 'Conceptos')

@section('contenido')

    <x-app-layout>
        <x-slot name="header">
            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <h2 class="flex items-center">
                        Conceptos para estudiar
                    </h2>
                    <div class="flex md:order-2">
                        <a href="{{ route('conceptos.create', ['estudio' => $estudio]) }}"
                            class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 text-center mr-3 md:mr-0">
                            Crear concepto
                        </a>
                    </div>
                </div>
            </nav>
        </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6 grid grid-flow-row auto-rows-min md:auto-rows-max">
                            @foreach ($estudio->conceptos as $concepto)
                                <div x-data="{ view: true, edit: false }" class="mb-6 mr-6">
                                    <form
                                        action="{{ route('conceptos.update', ['estudio' => $estudio, 'concepto' => $concepto]) }}"
                                        method="post">
                                        @csrf
                                        @method('patch')
                                        <div class="inline-flex items-center">
                                            <div x-show="view" class="mr-4">
                                                <p>{{ $concepto->concepto }}</p>
                                            </div>
                                            <div x-show="edit">
                                                <input type="text" name="concepto"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    value="{{ $concepto->concepto }}">
                                                <div class="flex flex-row space-x-4 mt-6">
                                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Actualizar</button>
                                                        <a @click="edit= false, view= true" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            Cancelar
                                                        </a>
                                                </div>
                                            </div>
                                            <div x-show="view">
                                                <a @click=" edit= true, view= false" class="hover:bg-gray-100 hover:text-blue-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>
@endsection
