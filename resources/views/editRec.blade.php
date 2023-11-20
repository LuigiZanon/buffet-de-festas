<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Editor de Texto</title>
    <!-- Inclua a biblioteca ClassicEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
</head>
<body>

<form action="{{route('salva.rec')}}" method="post">
    @csrf
    <div>
        <label for="desc">Descrição do Pacote:</label>
        <!-- Adicione a classe "editor" ao textarea -->
        <textarea class="form-control editor" id="rec" name="rec">Ex: Recomendações para a festa...</textarea>
    </div>

    <button type="submit">Enviar</button>
</form>

<!-- Inicialize o ClassicEditor -->
<script>
    // Esperar até que o DOM esteja pronto
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializar o ClassicEditor
        ClassicEditor
            .create(document.querySelector('#rec'))
            .then(editor => {
                // Personalizar o editor se necessário
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>

</body>
</html>
