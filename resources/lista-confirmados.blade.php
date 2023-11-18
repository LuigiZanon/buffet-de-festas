<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Convidados</title>
</head>
<body>
    <h1>Lista de Convidados</h1>

    <h2>Todos os Convidados:</h2>
    <ul>
        @foreach($todosOsConvidados as $convidado)
            <li>
                {{ $convidado->nome }} - 
                CPF: {{ $convidado->cpf ?? 'N/A' }} - 
                Idade: {{ $convidado->idade ?? 'N/A' }} anos
                @if (!$convidado->confirmado)
                    <form method="post" action="{{ route('confirmar.chegada', ['id' => $convidado->id]) }}" style="display:inline;">
                        @csrf
                        <button type="submit">Confirmar Chegada</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Adicionar Novo Convidado:</h2>
    <form method="post" action="{{ route('adicionar.convidado') }}">
        @csrf
        <label for="nome">Nome do Convidado:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="Opcional">

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" placeholder="Opcional">

        <button type="submit">Adicionar Convidado</button>
    </form>
</body>
</html>