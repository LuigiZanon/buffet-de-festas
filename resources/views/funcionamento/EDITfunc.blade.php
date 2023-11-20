<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamentos > Horário de funcionamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center items-center min-h-screen">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-6">
                <a href="{{ route('MENU.agenda') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
                <h2 class="mb-4 text-center text-white">Formulário de Inserção</h2>
                <div>
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <form action="{{ route('ADD.funcionamento') }}" method="post" class="flex flex-col items-center">

                    <label class="text-white" for="horarioMin">Horário Mínimo:</label>
                    <input class=" bg-gray-700 rounded-lg p-2" type="time" name="horarioMin" required>
                    <br>

                    <label class="text-white" for="horarioMax">Horário Máximo:</label>
                    <input class=" bg-gray-700 rounded-lg p-2" type="time" name="horarioMax" required>
                    <br>

                    <label class="text-white" for="horasPfesta">Horas por Festa:</label>
                    <input class=" bg-gray-700 rounded-lg p-2" type="number" name="horasPfesta" inputmode="numeric" required>
                    <br>

                    @csrf
                    <button type="submit"
                                    class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true">
                                    Alterar
                                </button>
                </form>
                <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
            </div>
        </div>
    </div>
</x-app-layout>
