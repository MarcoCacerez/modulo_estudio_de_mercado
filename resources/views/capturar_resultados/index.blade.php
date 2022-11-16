@extends('tema.sidebar')

@section('title', 'Capturar Resultados')

@section('contenido')
    <x-app-layout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-6">
                            @foreach ($estudio->conceptos as $concepto)
                                <form action="{{ route('resultados.update',['estudio'=>$estudio,'concepto'=>$concepto]) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div x-data="{view: true, edit: false}" class="flex flex-col md:flex-row items-center mb-6">
                                        <div class="basis-2/4 mr-4">
                                            <label for="{{ $concepto->concepto }}">{{ $concepto->concepto }}</label>
                                        </div>
                                        <textarea name="conclusion" placeholder="Agregar conclusión" rows="4" id="{{ $concepto->concepto }}" x-bind:disabled="view"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{
                                                $concepto->conclusion == "" ? "": $concepto->conclusion
                                            }}</textarea>
                                        <div class="mx-4" x-show="view">
                                            <a @click=" view= false, edit= true"  class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2.5 text-center mr-2 md:mr-0">Editar</a>
                                        </div>
                                        <div class="mx-4" x-show="edit">
                                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-base px-4 py-2.5 my-1 text-center">Guardar</button>
                                            <a @click=" view= true, edit= false"  class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-base px-4 py-2.5 my-1 text-center">Cancelar</a>
                                        </div>
                                    </div>
                                    <hr class="my-8 h-px bg-gray-700 border-0">
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
