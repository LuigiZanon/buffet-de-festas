<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Agendamento</title>
    <style>
        /* Adicione estilos conforme necessário */
    </style>
</head>
<body>
    <div>
        <h1>Calendário de Agendamento</h1>

        <form action="{{ route('processarAgendamento') }}" method="post">
            @csrf

            <label for="data">Escolha o dia:</label>
            <input type="date" name="data" required>

            <label for="horario">Escolha o horário:</label>
            <select name="horario" required>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
            </select>

            <button type="submit">Agendar</button>
        </form>
    </div>
</body>
</html>
