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
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf[]" required>
        <br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome[]" required>
        <br>

        <!-- Adicione mais campos conforme necessário (por exemplo, idade, email, etc.) -->

        <hr>

        <div id="pessoasExtras"></div>

        <button type="button" onclick="adicionarCampo()">Adicionar Pessoa</button>
        <br><br>

        <button type="submit">Enviar</button>
    </form>

    <script>
        function adicionarCampo() {
            var divPessoasExtras = document.getElementById('pessoasExtras');
            var novoCampo = document.createElement('div');
            novoCampo.innerHTML = `
                <hr>    
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf[]" required>
                <br>
            
                <label for="nome">Nome:</label>
                <input type="text" name="nome[]" required>
                <br>
            `;
            divPessoasExtras.appendChild(novoCampo);
        }
    </script>
</body>
</html>
