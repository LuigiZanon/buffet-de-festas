<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('MENU.agenda') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
                    <div class="flex flex-col items-center space-y-4">
                        <span class="ml-4">{{ __('GERENCIAR RESERVAS') }}</span>
                    </div>

        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Aniversariante</th>
                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Num de Convidados</th>
                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Pacote</th>
                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Data de Inicio</th>
                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Data de fim</th>
                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Status</th>
                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                <tr class="bg-purple-500 lg:hover:bg-purple-400 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-white text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Aniversariante</span>
                        {{ $reserva->nome }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Num de Convidados</span>
                        {{ $reserva->convidados }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                        @foreach($pacotes as $pacote)
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Num de Convidados</span>
                        @if($reserva->pacote && $reserva->pacote == $pacote->id)
                            {{ $pacote->titulo }}
                        @endif
                        @endforeach
                    </td>

                    <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Data de Inicio</span>
                        {{ $reserva->Dinicio }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Data de Fim</span>
                        {{ $reserva->Dfim }}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Status</span>
                        @if($reserva->status == 1)
                            <span class="rounded text-white bg-green-600 py-1 px-3 text-xs font-sans">Aprovada</span>
                        @elseif($reserva->status == 2)
                            <span class="rounded text-white bg-red-600 py-1 px-3 text-xs font-sans">Recusada</span>
                        @else
                            <span class="rounded text-white bg-yellow-500 py-1 px-3 text-xs font-sans">Pendente</span>
                        @endif
                    </td>
                    <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Ações</span>
                        <form action="{{ route('AGENDA.atualizar', $reserva->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="hover:underline hover:text-green-400" name="status" value="1">Aceitar</button>
                            <button type="submit" class="hover:underline hover:text-red-500" name="status" value="2">Recusar</button>
                            <button type="submit" class="hover:underline hover:text-yellow-300" name="status" value="0">Reset</button>
                        </form>
                        <form action="{{ route('AGENDA.excluir', $reserva->id) }}" method="post" onsubmit="return confirmarCancelar()">
                            @csrf
                            @method('delete')
                            <button type="submit" class="hover:underline hover:text-red-500">Excluir</button>
                        </form>
                        <script>
                            function confirmarCancelar() {
                                return confirm('Tem certeza que deseja cancelar?');
                            }
                        </script>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</x-app-layout>
