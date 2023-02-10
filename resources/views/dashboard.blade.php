<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start space-x-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Estudios de mercado
                </h2>
            </div>
            <div>
                <a href=" {{ route('estudios.create') }}"
                class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 font-bold focus:ring-blue-300 rounded-lg text-base px-5 py-2.5 mr-2 mb-2">
                    Crear estudio de mercado
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">

                        <section class="md:h-full flex items-center text-gray-600">
                            <div class="container px-5 py-14 mx-auto">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach ($estudios as $estudio)

                                        <div class="m-1 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                                            <div class="h-full rounded-lg overflow-hidden">
                                                <div class="p-6">
                                                    <h1 class="text-2xl font-semibold mb-3">{{ $estudio->nombre }}</h1>
                                                    <h2 class="text-base font-medium text-blue-400 mb-1">Creado el: {{ $estudio->created_at->format('d/m/Y') }}</h2>
                                                    <p class="leading-relaxed mb-3">{{ $estudio->objetivo }}</p>
                                                    <div class="flex items-center flex-wrap relative">
                                                        <a class="text-blue-400 inline-flex items-center md:mb-2 lg:mb-0" href="{{ route('estudios.show',['estudio'=>$estudio]) }}">Detalles
                                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M5 12h14"></path>
                                                                <path d="M12 5l7 7-7 7"></path>
                                                            </svg>
                                                        </a>
                                                        <form class="eliminar" action="{{ route('estudios.delete',['estudio'=>$estudio])  }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button>
                                                                <div class="absolute bottom-0 right-0 ...">
                                                                    <svg class="h-6 w-6 text-red-400"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
                                                                </div>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'Tu elemento ha sido borrado!',
                'success'
            )
        </script>
    @endif

    <script>
    let form = document.querySelectorAll(".eliminar");
    for(let i=0; i<form.length; i++){
        form[i].addEventListener('submit', function (event) {
	    event.preventDefault();

            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form[i].submit();
                }
            })
        });
    };
</script>
