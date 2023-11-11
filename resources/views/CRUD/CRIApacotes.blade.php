<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <h1>Criar produtos</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('CRUD.ADDpacote')}}">
        @csrf
        @method('post')
        <div>
            <label>Titulo do Pacote :</label>
            <input type="text" name="titulo" placeholder="Ex: Pacote 1"/>
        </div>
        <div>
            <label>1ª Imagem(URL):</label>
            <input type="text" name="img1" placeholder="Ex: https://imgur.com/gallery/NNuR1gp"/>
        </div>
        <div>
            <label>2ª Imagem(URL):</label>
            <input type="text" name="img2" placeholder="Ex: https://imgur.com/gallery/NNuR1gp"/>
        </div>
        <div>
            <label>3ª Imagem(URL):</label>
            <input type="text" name="img3" placeholder="Ex: https://imgur.com/gallery/NNuR1gp"/>
        </div>
        <div >
                <label>Descrição do Pacote:</label>
                <textarea class="form-control" id="editor" name="desc">Ex: este pacote contém...</textarea>
        </div>
        <div>
            <label>Preço:</label>
            <input type="text" name="price" placeholder="00.00"/> <label>R$ (Por pessoa)</label>
        </div>
        <div>
            <input type="submit" value="Salvar"/>
        </div>
    </form>
            <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                       .catch( error => {
                           console.error( error );
                       } );
            </script>
</body>
</html>
