<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('RESULTADO DAS PESQUISAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('MENU.posfesta') }}" class="text-white dark:text-pink-200 hover:underline">Voltar</a>
                    <div class="flex flex-col items-center space-y-4">
                        <span class="ml-4">{{ __('RESULTADO DAS PESQUISAS') }}</span>
                    </div>

    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">email</th>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Navegação</th>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Comida</th>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Teve problemas?</th>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Problema</th>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Recomendaria?</th>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Nota geral</th>
                <th class="p-3 font-sans uppercase bg-pink-500 text-white border border-gray-300 hidden lg:table-cell">Considerações finais</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resultados as $resultado)
            <tr class="bg-purple-500 lg:hover:bg-purple-400 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">email</span>
                    {{ $resultado->email }}
                </td>
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Navegação</span>
                    {{ $resultado->resposta1 }}
                </td>
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Comida</span>
                    {{ $resultado->resposta2 }}
                </td>
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Teve problemas?</span>
                    {{ $resultado->resposta3 }}
                </td>
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Problema</span>
                    {{ $resultado->resposta33 }}
                </td>
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Recomendaria?</span>
                    {{ $resultado->resposta4 }}
                </td>
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Nota geral</span>
                    {{ $resultado->resposta5 }}
                </td>
                <td class="w-full lg:w-auto p-3 text-white text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-sans uppercase">Considerações finais</span>
                    {{ $resultado->resposta6 }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</x-app-layout>
