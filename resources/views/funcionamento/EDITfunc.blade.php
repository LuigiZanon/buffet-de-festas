<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamentos > Horário de funcionamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('MENU.agenda') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
                    <h2>Formulário de Inserção</h2>
                    <div>
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <form action="{{route('ADD.funcionamento')}}" method="post">

                        <label for="horarioMin">Horário Mínimo:</label>
                        <input type="time" name="horarioMin" required>
                        <br>

                        <label for="horarioMax">Horário Máximo:</label>
                        <input type="time" name="horarioMax" required>
                        <br>

                        <label for="horasPfesta">Horas por Festa:</label>
                        <input type="number" name="horasPfesta" inputmode="numeric" required>
                        <br>
                        @csrf
                        <button type="submit">Enviar</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
