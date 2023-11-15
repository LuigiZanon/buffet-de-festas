<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>GERENCIA RESERVA</h1>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Nome</th>
                <th>Convidados</th>
                <th>Pacote</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->email }}</td>
                    <td>{{ $reserva->nome }}</td>
                    <td>{{ $reserva->convidados }}</td>
                    <td>{{ $reserva->pacote }}</td>
                    <td>{{ $reserva->Dinicio }}</td>
                    <td>{{ $reserva->Dfim }}</td>
                    <td>{{ $reserva->status }}</td>
                    <td>
                        <form action="{{ route('AGENDA.atualizar', $reserva->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" name="status" value="1">Aceitar</button>
                            <button type="submit" name="status" value="2">Recusar</button>
                            <button type="submit" name="status" value="0">Reset</button>
                        </form>
                        <form action="{{ route('AGENDA.excluir', $reserva->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Excluir</button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        <p>OBS: STATUS</p>
        <P>0 = PENDENTE</P>
        <P>1 = APROVADO</P>
        <P>0 = RECUSADO</P>
        </div>
</body>
</html>
