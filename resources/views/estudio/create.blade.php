<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear estudio de mercado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('estudios.store') }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del estudio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            @error('nombre')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="objetivo" class="block mb-2 text-sm font-medium text-gray-900">Objetivo</label>
                            <textarea name="objetivo" id="objetivo" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Ingrese el objetivo del estudio de mercado"></textarea>
                            @error('objetivo')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="objetivos_especificos" class="block mb-2 text-sm font-medium text-gray-900">Objetivos específicos</label>
                            <textarea name="objetivos_especificos" id="objetivos_especificos" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Ingrese los objetivos especificos"></textarea>
                            @error('objetivo')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="especificacion" class="block mb-2 text-sm font-medium text-gray-900">Especificacion de mercado</label>
                            <textarea name="especificacion" id="especificacion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                            placeholder="Ingrese la especificacion del estudio de mercado"></textarea>
                            @error('objetivo')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed bottom-5 right-5">
        <a href="javascript:history.back()">
        <button class="fixed z-90 bottom-10 right-8 bg-blue-600 hover:bg-blue-700 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl">
            <div class="flex space-x-4">
                <svg class="w-10 h-10 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </div>
        </button>
        </a>
    </div>
</x-app-layout>
