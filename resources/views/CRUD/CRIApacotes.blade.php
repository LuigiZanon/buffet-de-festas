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
            <label>Titulo</label>
            <input type="text" name="titulo" placeholder="titulo"/>
        </div>
        <div>
            <label>img1</label>
            <input type="text" name="img1" placeholder="imagem1"/>
        </div>
        <div>
            <label>img2</label>
            <input type="text" name="img2" placeholder="imagem2"/>
        </div>
        <div>
            <label>img3</label>
            <input type="text" name="img3" placeholder="imagem3"/>
        </div>
        <div >
                <textarea class="form-control" id="editor" name="desc">descrição do pacote</textarea>
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
