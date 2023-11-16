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
    <h1>Formulário de Feedback</h1>

    <form action="{{route('SALVA.pesquisa')}}" method="post">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <h3>O que achou da navegação em nosso site?</h3>
        <label>
            <input type="radio" name="resposta1" value="Muito boa"> Muito boa
        </label>

        <label>
            <input type="radio" name="resposta1" value="Boa"> Boa
        </label>

        <label>
            <input type="radio" name="resposta1" value="Indiferente"> Indiferente
        </label>

        <label>
            <input type="radio" name="resposta1" value="Ruim"> Ruim
        </label>

        <label>
            <input type="radio" name="resposta1" value="Péssima"> Péssima
        </label>

        <h3>O que achou da comida servida no local?</h3>
        <label>
            <input type="radio" name="resposta2" value="Muito boa"> Muito boa
        </label>

        <label>
            <input type="radio" name="resposta2" value="Boa"> Boa
        </label>

        <label>
            <input type="radio" name="resposta2" value="Indiferente"> Indiferente
        </label>

        <label>
            <input type="radio" name="resposta2" value="Ruim"> Ruim
        </label>

        <label>
            <input type="radio" name="resposta2" value="Péssima"> Péssima
        </label>


        <h3>Teve algum problema, desde a reserva da festa até o momento atual?</h3>
        <label>
            <input type="radio" name="resposta3" value="Não" class="toggleComentario"> Não
        </label>

        <label>
            <input type="radio" name="resposta3" value="Sim" class="toggleComentario"> Sim
        </label>

        <div id="caixaComentario" class="hidden">
            <h3>Conte-nos o que houve:</h3>
            <textarea id="consideracoes" name="resposta33"></textarea>
        </div>

        <h3>Qual a probabilidade de você recomendar o nosso serviço de Buffets a algum amigo ou familiar?</h3>
        <label>
            <input type="radio" name="resposta4" value="Muito Provável"> Muito Provável
        </label>

        <label>
            <input type="radio" name="resposta4" value="Provável"> Provável
        </label>

        <label>
            <input type="radio" name="resposta4" value="Incerto"> Incerto
        </label>

        <label>
            <input type="radio" name="resposta4" value="Improvável"> Improvável
        </label>

        <label>
            <input type="radio" name="resposta4" value="Muito Improvável"> Muito Improvável
        </label>

        <h3>Em uma nota de 1 a 10, como você classificaria a sua experiência conosco, no geral?</h3>
        <select id="classificacao" name="resposta5">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>

        <h3>Deixe suas considerações Finais, se desejar, abaixo:</h3>
        <textarea id="consideracoes" name="resposta6"></textarea>

        @csrf
        <button type="submit">Enviar Feedback</button>
    </form>

    <script>
        $(document).ready(function () {
            // Evento de clique para alternar a visibilidade da caixa de comentários
            $(".toggleComentario").on("click", function () {
                $("#caixaComentario").toggleClass("hidden", this.value !== "Sim");
            });
        });
    </script>
</body>
</html>
