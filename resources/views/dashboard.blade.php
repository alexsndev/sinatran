<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-yellow-700 leading-tight flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="12" r="10" stroke-width="2" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 3" />
            </svg>
            Painel Administrativo
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-yellow-100 via-yellow-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-2 border-yellow-300 shadow-lg sm:rounded-lg">
                <div class="p-8 text-yellow-900 text-lg font-semibold flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke-width="2" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v5l3 3" />
                    </svg>
                    Bem-vindo ao <span class="text-yellow-700 font-bold">Painel Administrativo</span>!
                    <div class="mt-4 text-base text-gray-700 font-normal">
                        Aqui você pode gerenciar notícias, convocações, usuários e acessar recursos exclusivos de administrador.
                    </div>
                    <div class="mt-8 flex flex-wrap gap-4 justify-center">
                        <a href="{{ route('admin.noticias.index') }}" class="px-5 py-3 rounded-lg bg-yellow-400 text-black font-semibold shadow hover:bg-yellow-300 transition">
                            Gerenciar Notícias
                        </a>
                        <a href="{{ route('convocacoes.index') }}" class="px-5 py-3 rounded-lg bg-yellow-200 text-yellow-900 font-semibold shadow hover:bg-yellow-100 transition">
                            Ver Convocações
                        </a>
                        <a href="{{ route('profile.edit') }}" class="px-5 py-3 rounded-lg bg-yellow-50 text-yellow-900 font-semibold shadow hover:bg-yellow-100 transition">
                            Meu Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
