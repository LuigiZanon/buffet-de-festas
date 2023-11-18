@if(session('success'))
    <div id="success-popup">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            var successPopup = document.getElementById('success-popup');
            if (successPopup) {
                successPopup.style.display = 'none';
            }
        }, 5000); // Fecha o pop-up após 5 segundos
    </script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Pessoas</title>
    <style>

        #success-popup {
            display: block;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #4caf50;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        body {
        font-family: 'Arial', sans-serif;
        background-color: #111827; /* Alterado para preto */
        color: #fff; /* Adicionado para melhor legibilidade no fundo preto */
        margin: 0;
        padding: 0;
    }

.container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h2 {
    text-align: center;
    color: #ffffff;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    font-weight: bold;
    color: #ffffff;
}

input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    box-sizing: border-box;
    background-color: #374151;
    border: 1px solid #ffffff; /* Adicionado para destacar a borda */
        color: #ffffff; /* Alterado para uma cor de texto visível */
}

button {
    background-color: #ec4899;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #fa60ad;
}

#pessoas {
    margin-top: 20px;
}

.pessoa {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
}
    </style>
</head>
<body>
    <h2>Cadastro de Pessoas</h2>
    <form action="{{ route('convidados.registrar') }}" method="post">
        @csrf
        <input type="hidden" name="pessoas[0][esperagenda_id]" value="{{ $festa->id }}">
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

        <button type="button" data-ripple-light="true" onclick="adicionarCampo()">Adicionar Pessoa</button>
        <br><br>
        @csrf
        <button type="submit" data-ripple-light="true">Enviar</button>
    </form>

    <script>
        var contadorPessoas = 1;

        function adicionarCampo() {
            var divPessoas = document.getElementById('pessoas');
            var novaPessoa = document.createElement('div');
            novaPessoa.className = 'pessoa';
            novaPessoa.innerHTML = `
                <hr>
                <input type="hidden" name="pessoas[${contadorPessoas}][esperagenda_id]" value="{{ $festa->id }}">
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
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
</body>
</html>
