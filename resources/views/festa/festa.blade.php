<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Festa de :reserva', ['reserva' => $reserva->nome]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('dashboard') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>

    <div class="flex flex-col items-center space-y-4">
        {{ __("Festa de $reserva->nome") }}
        </div>
        <div class="flex flex-col items-center space-y-4">
            <a href="{{ route('edita.pacoteFesta', ['titulo' => $reserva->nome])}}"
            class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            data-ripple-light="true">
            Editar Pacote
         </a>

         <div class="flex flex-col items-center space-y-4">
            <a href="{{route('edita.convidados', ['titulo' => $reserva->nome])}}"
            class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            data-ripple-light="true">
            Convidados
         </a>
         @if($pesquisa && $pesquisa->email)
         <div class="flex flex-col items-center space-y-4">
            <a href="{{route('RES.pesquisa', ['festaID' =>$reserva->id, 'titulo' => $reserva->nome])}}"
            class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            data-ripple-light="true">
            Resultado da sua pesquisa
         </a>
         @else
         <div class="flex flex-col items-center space-y-4">
            <a href="{{route('FAZ.pesquisa', ['festaID' =>$reserva->id, 'titulo' => $reserva->nome])}}"
            class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            data-ripple-light="true">
            Pesquisa de satisfação
         </a>
         @endif
         <div class="flex flex-col items-center space-y-4">
            <form method="POST" action="{{ route('excluir.reserva', ['id' => $reserva->id]) }}" onsubmit="return confirmarCancelar()">
                @csrf
                @method('delete')
            <button type="submit" class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            data-ripple-light="true">
           Cancelar festa
            </button>
            </form>

         <p>Lista de Recomendações:</p>
        <p>{!! $recomendacao->rec !!}</p>
        </div>

          <!-- Ripple Effect from cdn -->
          <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
          <script>
            function confirmarCancelar() {
                return confirm('Tem certeza que deseja cancelar?');
            }
        </script>

</div>
</div>
</div>
</div>
</x-app-layout>
