<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamentos') }}
        </h2>
    </x-slot>
    @php
    $user = Auth::user();
    $allowedPermissions = ['access_comercial', 'access_admin'];
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-center space-y-4">
                        @if (collect($allowedPermissions)->contains(function ($permission) use ($user) {
                          return $user->can($permission);
                      }))
                        <a href="{{ route('AGENDA.ADMreserva') }}"
                        class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">
                         GERENCIAR RESERVAS
                     </a>
                     <a href="{{ route('HORAfuncionamento') }}"
                     class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                     data-ripple-light="true">
                      HORARIO DE FUNCIONAMENTO
                  </a>
                  <a href="{{ route('edit.rec') }}"
                  class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                  data-ripple-light="true">
                  EDITAR RECOMENDAÇÕES
              </a>
              @else
                        <a href="{{ route('AGENDA.CRIAreserva')}}"
                        class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-light="true">
                         AGENDAR NOVA FESTA
                     </a>

                     <a href="{{ route('AGENDA.STATUSreserva') }}"
                     class="rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                     data-ripple-light="true">
                      VERIFICAR STATUS
                  </a>
                  @endif
                    </div>

                      <!-- Ripple Effect from cdn -->
                      <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
