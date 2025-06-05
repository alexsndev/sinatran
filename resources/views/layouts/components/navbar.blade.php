<nav class="bg-white border-b w-full">
    <div class="container mx-auto flex items-center justify-between px-2 py-3 sm:py-1">
        <a href="{{ route('home') }}" class="no-underline flex items-center min-w-0" style="cursor:pointer;">
            <img src="{{ asset('images/sinatrandf.png') }}" alt="Logo Sinatrandf" class="h-12 w-auto sm:h-16" style="cursor:pointer;">
            <span class="ml-3 text-xs sm:text-sm md:text-base lg:text-lg xl:text-lg font-semibold text-black no-underline flex items-center h-full">
                SINDICATO DOS AGENTES DE TRANSITO DO DF
            </span>
        </a>

        <button id="navbar-toggle" class="sm:hidden p-2 rounded text-black focus:outline-none self-center">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <div class="flex items-center h-full">
            <ul id="navbar-menu" class="hidden sm:flex flex-col sm:flex-row gap-2 sm:gap-6 text-black bg-white absolute sm:static left-0 right-0 top-16 sm:top-auto z-40 px-2 sm:px-0 py-2 sm:py-0 border-b sm:border-0 transition-all duration-200 ease-in-out items-center">
                <li><a href="{{ route('home') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Início</a></li>
                <li><a href="{{ route('sobre') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Sobre</a></li>
                <li><a href="{{ url('/legislacao') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Legislação</a></li>
                <li><a href="{{ route('convocacoes.index') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Convocações</a></li>
                @auth
                    @if(auth()->user()->is_admin ?? false)
                        <li>
                            <a href="{{ route('admin.noticias.create') }}" class="flex items-center py-1 px-3 rounded bg-black text-white hover:bg-gray-800 hover:text-white transition no-underline" title="Criar Post">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                Novo Post
                            </a>
                        </li>
                    @endif
                    <li class="relative group">
                        <button type="button" id="profile-btn" class="flex items-center py-1 px-3 rounded hover:bg-gray-100 hover:text-black focus:outline-none" title="Perfil">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="8" r="4" stroke-width="2"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6"/>
                            </svg>
                        </button>
                        <ul id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg py-1 z-50 hidden pl-0">
                            <li>
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-black hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Perfil
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                                        </svg>
                                        Sair
                                    </button>
                                </form>
                            </li>
                            @if(auth()->user()->is_admin ?? false)
                                <li>
                                    <button type="button" onclick="window.location='{{ route('admin.dashboard') }}'" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3v4M8 3v4M4 11h16"/>
                                        </svg>
                                        Painel Admin
                                    </button>
                                </li>
                                <li>
                                    <button type="button" onclick="window.location='{{ route('admin.noticias.index') }}'" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3v4M8 3v4M4 11h16"/>
                                        </svg>
                                        Admin Notícias
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </li>
                @else
                    <li class="relative group">
                        <button type="button" id="profile-btn" class="flex items-center py-1 px-3 rounded hover:bg-gray-100 hover:text-black focus:outline-none" title="Perfil">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="8" r="4" stroke-width="2"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6"/>
                            </svg>
                        </button>
                        <ul id="profile-dropdown" class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg py-1 z-50 hidden pl-0">
                            <li>
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">Logar</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">Registrar</a>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('navbar-toggle');
            const menu = document.getElementById('navbar-menu');
            toggle?.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });

            const profileBtn = document.getElementById('profile-btn');
            const profileDropdown = document.getElementById('profile-dropdown');
            if (profileBtn && profileDropdown) {
                profileBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    profileDropdown.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!profileDropdown.contains(e.target) && e.target !== profileBtn) {
                        profileDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</nav>
