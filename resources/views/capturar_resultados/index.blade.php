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
                                        <div class="basis-1/4 mr-4">
                                            <label for="{{ $concepto->concepto }}">{{ $concepto->concepto }}</label>
                                        </div>
                                        <textarea name="conclusion" rows="4" id="{{ $concepto->concepto }}" x-bind:disabled="view"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{
                                                $concepto->conclusion == "" ? "Agregar conclusion ": $concepto->conclusion
                                            }}</textarea>
                                        <div class="mx-4" x-show="view">
                                            <a @click=" view= false, edit= true">editar</a>
                                        </div>
                                        <div class="mx-4" x-show="edit">
                                            <button>Guardar</button>
                                            <a @click=" view= true, edit= false">cancelar</a>
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
