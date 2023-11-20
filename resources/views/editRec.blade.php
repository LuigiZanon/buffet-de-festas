<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamentos > Editar recomendações') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('MENU.agenda') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<form action="{{route('salva.rec')}}" method="post">
    @csrf
    <div>
        <label for="desc">Descrição do Pacote:</label>
        <!-- Adicione a classe "editor" ao textarea -->
        <textarea class="form-control editor" id="rec" name="rec">Ex: Recomendações para a festa...</textarea>
    </div>

    <button type="submit"
    class="middle none center rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
    data-ripple-light="true"
  >
    Enviar
  </button>
</form>

<!-- Inicialize o ClassicEditor -->
<script>
    // Esperar até que o DOM esteja pronto
    document.addEventListener('DOMContentLoaded', function() {
  ClassicEditor
    .create(document.querySelector('#rec'))
    .then(editor => {
      // Editor initialization successful
      editor.editing.view.change(writer => {
        writer.setStyle({ color: 'white' }, editor.editing.view.document.getRoot());
        writer.setStyle({ 'background-color': '#1f2937' }, editor.editing.view.document.getRoot());
      });
    })
    .catch(error => {
      console.error(error);
      // Editor initialization failed
      // Apply styles here to ensure they are applied even if editor initialization fails
      document.querySelector('#rec').style.color = 'white';
      document.querySelector('#rec').style.backgroundColor = '#1f2937';
    });
});
</script>

</div>
</div>
</div>
</div>
</x-app-layout>
