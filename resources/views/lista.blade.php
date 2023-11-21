<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamentos > Gerenciar reservas > lista de convidados de :reserva', ['reserva' => $reserva->nome]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="fixed top-0 right-0 bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Pacote de Comidas: {{$pacote->titulo}}
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Convidados presentes: {{ count($convidados->where('presente', 1)) }} / {{ count($convidados) }}
                    </p>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('AGENDA.ADMreserva') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
                    <h1>Festa de {{$reserva->nome}}</h1>


                    <table class="border-collapse w-full">
                        <thead>
                            <tr>
                                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Nome</th>
                                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">CPF</th>
                                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Idade</th>
                                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Presença</th>
                                    <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($convidados as $convidado)
                            <tr class="bg-purple-500 lg:hover:bg-purple-400 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td class="w-full lg:w-auto p-3 text-white text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Nome</span>
                                    {{ $convidado->nome }}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">CPF</span>
                                    {{ $convidado->cpf }}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Idade</span>
                                    {{ $convidado->idade }}
                                </td>
                                  <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Status</span>
                                    @if($convidado->presente == 1)
                                        <span class="rounded text-white bg-green-600 py-1 px-3 text-xs font-sans">Presente</span>
                                    @else
                                        <span class="rounded text-white bg-red-600 py-1 px-3 text-xs font-sans">Ausente</span>
                                    @endif
                                  </td>
                                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Ações</span>
                                    <form action="{{ route('presenca.atualizar', ['id' => $reserva->id, 'idP' => $convidado->id]) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="hover:underline hover:text-green-400" name="status" value="1">Presente</button>
                                        <p>---</p>
                                        <button type="submit" class="hover:underline hover:text-red-500" name="status" value="0">Ausente</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('convidado.extra', ['id' => $reserva->id]) }}" method="post">
                        @csrf
                        <input type="hidden" name="pessoas[0][esperagenda_id]" value="{{ $reserva->id }}">
                        <input type="hidden" name="pessoas[0][presente]" value="1">
                        <div id="pessoas">
                            <div class="pessoa">
                                <label for="nome">Nome:</label>
                                <input class="w-full bg-gray-700 rounded-lg p-2" type="text" name="pessoas[0][nome]" required>
                                <br>

                                <label for="cpf">CPF:</label>
                                <input class="w-full bg-gray-700 rounded-lg p-2" type="number" name="pessoas[0][cpf]" inputmode="numeric" required>
                                <br>

                                <label for="idade">Idade:</label>
                                <input class="w-full bg-gray-700 rounded-lg p-2" type="number" name="pessoas[0][idade]" inputmode="numeric" required>
                                <br>
                            </div>
                        </div>

                        <hr>

                        <button type="button"
                                    class="rounded-lg bg-pink-500 py-1 px-2 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true" onclick="adicionarCampo()">
                                    Adicionar Pessoa
                                </button>
                        <br><br>
                        @csrf
                        <button type="submit"
                                    class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true">
                                    Cadastrar
                                </button>
                    </form>

                    <script>
                        var contadorPessoas = 1;

                        function adicionarCampo() {
                            var divPessoas = document.getElementById('pessoas');
                            var novaPessoa = document.createElement('div');
                            novaPessoa.className = 'pessoa';
                            novaPessoa.innerHTML = `
                                <hr>
                                <input type="hidden" name="pessoas[${contadorPessoas}][esperagenda_id]" value="{{ $reserva->id }}">
                                <input type="hidden" name="pessoas[${contadorPessoas}][presente]" value="1">
                                <label for="nome">Nome:</label>
                                <input class="w-full bg-gray-700 rounded-lg p-2" type="text" name="pessoas[${contadorPessoas}][nome]" required>
                                <br>

                                <label for="cpf">CPF:</label>
                                <input class="w-full bg-gray-700 rounded-lg p-2" type="num" name="pessoas[${contadorPessoas}][cpf]" inputmode="numeric" required>
                                <br>

                                <label for="idade">Idade:</label>
                                <input class="w-full bg-gray-700 rounded-lg p-2" type="number" name="pessoas[${contadorPessoas}][idade]" inputmode="numeric" required>
                                <br>

                            `;
                            divPessoas.appendChild(novaPessoa);
                            contadorPessoas++;
                        }
                    </script>
                    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
                </div>
            </div>
            </div>
            </div>
            </x-app-layout>
