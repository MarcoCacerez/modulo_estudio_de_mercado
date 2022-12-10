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
                    <a href="#" id="btn_editar">
                        <button class="text-white text-base bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center mr-3 md:mr-0" name="check" id="check" value="1" onclick="javascript:showContent()">
                            Editar
                        </button>
                    </a>
                    <a href="{{ route('conclusion.create',['estudio'=>$estudio]) }}" id="btn_crear" style="display: none">
                        <button class="text-white text-base bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center mr-3 md:mr-0" name="check" id="check" value="1">
                            Crear conclusion
                        </button>
                    </a>
                </div>
            </div>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div id="conclusion_txt" class="text-base">
                        @if ($estudio->conclusion == null)
                            <h1>Aun no tienes una conclusion</h1>
                                <script type="text/javascript">
                                    btn_edit = document.getElementById("btn_editar").style.display = 'none';
                                    btn_crear = document.getElementById("btn_crear").style.display = 'block';
                                </script>

                            @else
                            <h1>{{ $estudio->conclusion['conclusion'] }}</h1>
                                <script type="text/javascript">
                                    btn_edit = document.getElementById("btn_editar").style.display = 'block';
                                    btn_crear = document.getElementById("btn_crear").style.display = 'none';
                                </script>
                        @endif
                    </div>

                    <div id="edit" style="display: none;">
                        <form action="{{ route('conclusion.update',['estudio'=>$estudio]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="mb-6">
                                <label for="conclusion" class="block mb-2 text-lg text-center font-medium text-gray-900">Actualizar conclusión</label>
                                <textarea name="conclusion" id="conclusion" rows="8" class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Ingrese la conclusión del estudio a la que se llegó tras hacer las investigaciones">@if ($estudio->conclusion == null)Aun no tienes una conclusion @else{{ $estudio->conclusion['conclusion'] }}@endif</textarea>
                                @error('objetivo')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
    
                            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function showContent() {
            form_edit = document.getElementById("edit");
            conclusion_txt = document.getElementById("conclusion_txt");
            if (form_edit.style.display == 'none') {
                form_edit.style.display='block';
                conclusion_txt.style.display='none';
            }
            else {
                form_edit.style.display='none';
                conclusion_txt.style.display='block';
            }
        }
    </script>

</x-app-layout>

@endsection
