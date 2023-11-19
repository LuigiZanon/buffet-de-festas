<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    <h1>Formulário de Feedback - Suas respostas</h1>

    <form action="{{route('SALVA.pesquisa')}}" method="post">
        @foreach($respostas as $resposta)
        <h3>O que achou da navegação em nosso site?</h3>
        <label>
            <p>R: {{ $resposta->resposta1}}</p>
        </label>

        <h3>O que achou da comida servida no local?</h3>
        <label>
            <p>R: {{ $resposta->resposta2}}</p>
        </label>


        <h3>Teve algum problema, desde a reserva da festa até o momento atual?</h3>
        <label>
            <p>R: {{ $resposta->resposta3}}</p>
        </label>
        @if ($resposta->resposta3 == 'sim')
        <h3>Conte-nos o que houve:</h3>
        <label>
            <p>R: {{ $resposta->resposta33}}</p>
        </label>
        @endif
        <h3>Qual a probabilidade de você recomendar o nosso serviço de Buffets a algum amigo ou familiar?</h3>
        <label>
            <p>R: {{ $resposta->resposta4}}</p>
        </label>

        <h3>Em uma nota de 1 a 10, como você classificaria a sua experiência conosco, no geral?</h3>
        <label>
            <p>R: {{ $resposta->resposta5}}</p>
        </label>
        @if ($resposta->resposta6 != 'vazio')
        <h3>Deixe suas considerações Finais, se desejar, abaixo:</h3>
        <label>
            <p>R: {{ $resposta->resposta6}}</p>
        </label>
        @endif
        @endforeach
    </form>
</div>
</div>
</div>
</div>
</x-app-layout>
