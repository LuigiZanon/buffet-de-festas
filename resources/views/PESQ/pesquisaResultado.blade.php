<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesquisa de Satisfação</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
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
</body>
</html>
