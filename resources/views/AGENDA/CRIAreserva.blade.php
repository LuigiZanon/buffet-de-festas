<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div>
            <h1>Calendário de Agendamento</h1>
            <div>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        <form action="{{route('ADD.agenda')}}" method="post">
            @csrf
            <div>
                <label>Nome do Aniversariante:</label>
                <input type="text" name="nome" placeholder="Nome do Aniversariante"/>
            </div>
            <div>
                <label>Idade a ser comemorada</label>
                <input type="text" name="idade" placeholder="idade"/>
            </div>
            <div>
                <label>Num de Convidados:</label>
                <input type="text" name="convidados" placeholder="Num de convidados"/>
            </div>
            <div>
                <label>Pacote:</label>
                <select name="pacote" required>
                    @foreach($pacotes as $pacote)
                        <option value="{{ $pacote->titulo }}">{{ $pacote->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="start_datetime">Data e Hora de Início:</label>
                <input type="datetime-local" name="Dinicio" required>
            </div>
            <div>
                <label for="end_datetime">Data e Hora de Fim:</label>
                <input type="datetime-local" name="Dfim" required>
            </div>
            <button type="submit">Agendar</button>
        </form>
    </div>
</body>
</html>
