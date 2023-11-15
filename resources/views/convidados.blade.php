<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Pessoas</title>
</head>
<body>
    <h2>Cadastro de Pessoas</h2>
    <form action="{{ route('registrarConvidados') }}" method="post">
        @csrf
        <div id="pessoas">
            <div class="pessoa">
                <label for="cpf">CPF:</label>
                <input type="number" name="pessoas[0][cpf]" inputmode="numeric" required>
                <br>

                <label for="nome">Nome:</label>
                <input type="text" name="pessoas[0][nome]" required>
                <br>
                
                <label for="idade">Idade:</label>
                <input type="number" name="pessoas[0][idade]" inputmode="numeric" required>
                <br>
            </div>
        </div>

        <hr>

        <button type="button" onclick="adicionarCampo()">Adicionar Pessoa</button>
        <br><br>

        <button type="submit">Enviar</button>
    </form>

    <script>
        var contadorPessoas = 1;

        function adicionarCampo() {
            var divPessoas = document.getElementById('pessoas');
            var novaPessoa = document.createElement('div');
            novaPessoa.className = 'pessoa';
            novaPessoa.innerHTML = `
                <hr>    
                <label for="cpf">CPF:</label>
                <input type="num" name="pessoas[${contadorPessoas}][cpf]" inputmode="numeric" required>
                <br>
            
                <label for="nome">Nome:</label>
                <input type="text" name="pessoas[${contadorPessoas}][nome]" required>
                <br>

                <label for="idade">Idade:</label>
                <input type="number" name="pessoas[${contadorPessoas}][idade]" inputmode="numeric" required>
                <br>
            `;
            divPessoas.appendChild(novaPessoa);
            contadorPessoas++;
        }
    </script>
</body>
</html>