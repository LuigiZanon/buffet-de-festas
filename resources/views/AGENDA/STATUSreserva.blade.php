<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>STATUS RESERVA</h1>


    <h1>Status da Reserva</h1>

    <table>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Convidados</th>
                    <th>Pacote</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Status</th>
                </tr>
            </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->nome }}</td>
                    <td>{{ $reserva->convidados }}</td>
                    <td>{{ $reserva->pacote }}</td>
                    <td>{{ $reserva->Dinicio }}</td>
                    <td>{{ $reserva->Dfim }}</td>
                    <td>{{ $reserva->status }}</td>
                    <td>
                        @if($reserva->status == 0)
                            Pendente
                        @elseif($reserva->status == 1)
                            Aprovada
                        @elseif($reserva->status == 2)
                            Recusada
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
