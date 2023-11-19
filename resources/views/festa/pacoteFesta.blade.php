<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('AGENDAR') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('select.Festa', ['titulo' => $reserva->nome]) }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
                    <div class="flex flex-col items-center space-y-4">
                        <span class="ml-4">{{ __('PACOTE ATUAL') }}</span>
                    </div>
                    <div>
                        <div>
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        @foreach($pacotes as $pacote)
                        @if($pacote->id == $reserva->pacote)
                            <div class="rounded-lg bg-pink-500 py-3 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 text-center">
                            <h2 class="text-lg font-semibold">{{$pacote->titulo}}</h2>
                            <div class="flex mt-4">
                            <img src="{{$pacote->img1}}" alt="{{$pacote->titulo}}" class="w-25 h-25 object-cover rounded mx-auto mb-4 square-img">
                            <img src="{{$pacote->img2}}" alt="{{$pacote->titulo}}" class="w-25 h-25 object-cover rounded mx-auto mb-4 square-img">
                            <img src="{{$pacote->img3}}" alt="{{$pacote->titulo}}" class="w-25 h-25 object-cover rounded mx-auto mb-4 square-img">
                            </div>
                            <p class="mt-2">Descrição: {!! $pacote->desc !!}</p>
                            <p class="mt-2">Preço: R$ {{$pacote->price}} por pessoa</p>
                            <input type="hidden" id="precoAtual" name="precoAtual" value="{{$pacote->price}}">
                            </div>
                        @endif
                        @endforeach
                        <form action="{{route('atualizar.pacote', ['titulo' => $reserva->nome, 'idReserva' => $reserva->id])}}" method="post" class="grid grid-cols-2 gap-4">
                            @csrf

                            <div class="col-span-2 text-center mx-auto my-3">
                                <label for="pacoteSelect" class="block">Pacote:</label>
                                <select name="pacote" id="pacoteSelect" required class="w-full bg-gray-700 rounded-lg p-2">
                                    <option value=" " disabled selected>Selecione um pacote:</option>
                                    @foreach($pacotes as $pacote)
                                        <option value="{{ $pacote->id }}">{{ $pacote->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-2 flex items-center justify-center">
                            <div id="pacoteInfo" class="mt-8">
                                <!-- Aqui serão exibidas as informações do pacote selecionado -->
                            </div>
                            </div>
                            <div class="col-span-2 flex items-center justify-center">
                                <button type="submit"
                                    class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true">
                                    ALTERAR PACOTE
                                </button>
                            </div>

                        </form>





                      <!-- Ripple Effect from cdn -->
                      <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>



                        <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const pacoteSelect = document.getElementById('pacoteSelect');
                            const pacoteInfoContainer = document.getElementById('pacoteInfo');

                            pacoteSelect.addEventListener('change', async function () {
                                const selectedPacote = pacoteSelect.value;

                                // Chame uma função ou faça uma solicitação AJAX para obter as informações do pacote com base em selectedPacote
                                // Aqui você pode usar o Laravel Eloquent para buscar as informações do banco de dados
                                const pacote = await getPacoteInfoFromDatabase(selectedPacote);

                                // Atualize a exibição das informações do pacote
                                pacoteInfoContainer.innerHTML = `
                                <div class="rounded-lg bg-pink-500 py-3 px-6 font-sans font-bold uppercase text-white shadow-md shadow-pink-500/20 text-center">
                                <h1>Informações do pacote selecionado:</h1>
                                <h2 class="text-lg font-semibold">${pacote.titulo}</h2>
                                <div class="flex mt-4">
                                <img src="${pacote.img1}" alt="${pacote.titulo}" class="w-25 h-25 object-cover rounded mx-auto mb-4 square-img">
                                <img src="${pacote.img2}" alt="${pacote.titulo}" class="w-25 h-25 object-cover rounded mx-auto mb-4 square-img">
                                <img src="${pacote.img3}" alt="${pacote.titulo}" class="w-25 h-25 object-cover rounded mx-auto mb-4 square-img">
                                </div>
                                <p class="mt-2">Descrição: ${pacote.desc}</p>
                                <p class="mt-2">Preço: R$ ${pacote.price} por pessoa</p>
                                </div>
                                <div id="diferenca-preco" class="col-span-2 flex items-center justify-center mt-4">
                                </div>
                                `;

                                const precoAtualInput = document.getElementById('precoAtual');
        const precoAtual = parseFloat(precoAtualInput.value);

        // Calcular e exibir a diferença de preço
        const novoPacoteInfo = await getPacoteInfoFromDatabase(selectedPacote);

        const diferencaPrecoElement = document.getElementById('diferenca-preco');
        const diferencaPreco = novoPacoteInfo.price - precoAtual;
        diferencaPrecoElement.innerHTML = `
        <p>Diferença de preço: R$ ${diferencaPreco.toFixed(2)}</p>
        `;

                            });

                            // Função para obter informações do pacote do banco de dados usando o Laravel Eloquent
                            async function getPacoteInfoFromDatabase(selectedPacote) {
                                try {
                                    // Substitua pelo caminho real do modelo Pacote
                                    const response = await fetch(`/pacotes/fetch/${selectedPacote}`);
                                    const data = await response.json();
                                    return data;
                                } catch (error) {
                                    console.error('Erro ao obter informações do pacote:', error);
                                    return {};
                                }
                            }
                        });
                        </script>
                        <style>.square-img {
                            width: 30%;
                            padding-bottom: 1%; /* Criando um quadrado usando uma proporção de padding */
                            object-fit: cover; /* Garante que a imagem cubra completamente o contêiner */
                        }
                        </style>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
