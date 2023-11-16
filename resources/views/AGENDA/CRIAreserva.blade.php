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
                    <a href="{{ route('MENU.agenda') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
                    <div class="flex flex-col items-center space-y-4">
                        <span class="ml-4">{{ __('CRIAR UM NOVO AGENDAMENTO') }}</span>
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
                        <form action="{{route('ADD.agenda')}}" method="post" class="grid grid-cols-2 gap-4">
                            @csrf
                            <div class="flex flex-col items-center mb-4">
                                <label>Nome do Aniversariante:</label>
                                <input type="text" name="nome" placeholder="Nome" class="w-full bg-gray-700 rounded-lg p-2"/>
                            </div>
                            <div class="flex flex-col items-center mb-4">
                                <label>Idade a ser comemorada:</label>
                                <input type="text" name="idade" placeholder="Idade" class="w-full bg-gray-700 rounded-lg p-2"/>
                            </div>
                            <div class="flex flex-col items-center mb-4">
                                <label>Num de Convidados:</label>
                                <input type="text" name="convidados" placeholder="Convidados" class="w-full bg-gray-700 rounded-lg p-2"/>
                            </div>
                            <div class="flex flex-col items-center mb-4">
                                <label>Pacote:</label>
                                <select name="pacote" required class="w-full bg-gray-700 rounded-lg p-2">
                                    @foreach($pacotes as $pacote)
                                        <option value="{{ $pacote->titulo }}">{{ $pacote->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col items-center mb-4">
                                <label for="start_datetime">Data e Hora de Início:</label>
                                <input type="datetime-local" name="Dinicio" required class="w-full bg-gray-700 rounded-lg p-2"/>
                            </div>
                            <div class="flex flex-col items-center mb-4">
                                <label for="end_datetime">Data e Hora de Fim:</label>
                                <input type="datetime-local" name="Dfim" required class="w-full bg-gray-700 rounded-lg p-2"/>
                            </div>
                            <div class="col-span-2 flex items-center justify-center">
                                <button type="submit"
                                    class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true">
                                    Agendar
                                </button>
                            </div>

                        </form>
                        @if(isset($pacote))
                        <div class="mt-8">
                            <h2 class="text-lg font-semibold">{{ $pacote->titulo }}</h2>
                            <div class="flex space-x-4 mt-4">
                                <!-- Exemplo de exibição de imagens (substitua com suas próprias imagens e estilos) -->
                                <img src="{{ asset($pacote->img1) }}" alt="{{ $pacote->titulo }}" class="w-20 h-20 object-cover rounded">
                                <img src="{{ asset($pacote->img2) }}" alt="{{ $pacote->titulo }}" class="w-20 h-20 object-cover rounded">
                                <img src="{{ asset($pacote->img3) }}" alt="{{ $pacote->titulo }}" class="w-20 h-20 object-cover rounded">
                            </div>
                            <?php
	                        $data = str_replace( '&', '&', $pacote->desc );
                            ?>
                            <textarea name="content" id="editor"><?= $pacote->desc ?></textarea>
                            <p class="mt-2">Preço: R$ {{ $pacote->price }}</p>
                        </div>
                    @endif
                      <!-- Ripple Effect from cdn -->
                      <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
