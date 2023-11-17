<link rel="stylesheet" type="text/css" href="caixa.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
            <input type="text" name="titulo" placeholder="Ex: Pacote 1" class="w-full bg-gray-800 rounded-lg p-2" style="border:0px"/>
        </div>
        <div>
            <label>1ª Imagem(URL) :</label>
            <input type="text" name="img1" placeholder="Ex: https://imgur.com/gallery/NNuR1gp" class="w-full bg-gray-800 rounded-lg p-2" style="border:0px"/>
        </div>
        <div>
            <label>2ª Imagem(URL):</label>
            <input type="text" name="img2" placeholder="Ex: https://imgur.com/gallery/NNuR1gp" class="w-full bg-gray-800 rounded-lg p-2" style="border:0px"/>
        </div>
        <div>
            <label>3ª Imagem(URL):</label>
            <input type="text" name="img3" placeholder="Ex: https://imgur.com/gallery/NNuR1gp" class="w-full bg-gray-800 rounded-lg p-2" style="border:0px"/>
        </div>
        <div >
                <label>Descrição do Pacote:</label>
                <textarea class="form-control" id="editor" name="desc">Ex: este pacote contém...</textarea>
        </div>

        <div>
            <label>Preço(R$ Por Pessoa):</label>
            <input type="text" name="price" placeholder="00.00 R$" class="w-full bg-gray-800 rounded-lg p-2" style="border:0px"/>
        </div>
        <button type="submit"
  class="middle none center rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true"
>
  Salvar
</button>

</div>

    </form>

            <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                       .catch( error => {
                           console.error( error );
                       }
                       );
            </script>


                <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
