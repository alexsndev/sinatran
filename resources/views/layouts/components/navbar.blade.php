<nav class="bg-white w-full z-50" style="border-bottom: none;">
    <div class="container mx-auto flex items-center justify-between px-4 pt-2 pb-1 sm:py-2 relative">
        {{-- Logo e Título --}}
        <a href="{{ route('home') }}" class="flex flex-row items-center min-w-0 gap-2 text-black no-underline">
            <img src="{{ asset('images/sinatrandf.png') }}" alt="Logo Sinatrandf"
                 class="h-16 sm:h-16 w-auto">
            <span class="text-xs sm:text-sm md:text-base font-semibold max-w-[300px] sm:max-w-[400px] leading-tight whitespace-normal" style="line-height:1.2;">
                SINDICATO DOS AGENTES DE<br>TRÂNSITO DO DISTRITO FEDERAL
            </span>
        </a>

        {{-- Botão Mobile (Hamburguer) --}}
        {{-- Usando Heroicons (https://heroicons.com/) via SVG inline --}}
        <button id="navbar-toggle"
                class="block sm:hidden flex items-center justify-center p-0 m-0 rounded text-black focus:outline-none z-50"
                aria-label="Abrir menu"
                style="margin-right: 0; background: none; border: none;">
            {{-- Heroicon: Bars-3 --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 menu-svg-force-visible" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        {{-- Menu de Navegação Desktop --}}
        <div class="hidden sm:flex flex-1 justify-center">
            <ul id="navbar-menu"
                class="flex flex-row items-center gap-3 text-sm text-black whitespace-nowrap">
                <li><a href="{{ route('home') }}" class="py-1 px-3 rounded hover:bg-gray-100">Início</a></li>
                <li><a href="{{ route('sobre') }}" class="py-1 px-3 rounded hover:bg-gray-100">Sobre</a></li>
                <li><a href="{{ url('/legislacao') }}" class="py-1 px-3 rounded hover:bg-gray-100">Legislação</a></li>
                <li><a href="{{ route('convocacoes.index') }}" class="py-1 px-3 rounded hover:bg-gray-100">Convocações</a></li>
            </ul>
        </div>

        {{-- Botões Desktop --}}
        <div class="hidden sm:flex items-center gap-2 ml-4 relative z-40">
            <a href="{{ route('filiacao.create') }}"
               class="py-1 px-3 text-sm font-medium border border-yellow-400 text-black bg-yellow-400 rounded flex items-center gap-2 hover:bg-[#dbfc03] hover:text-yellow-900 hover:shadow transition"
               style="background: #fde047; border-radius: 0.375rem; transition: background 0.2s, color 0.2s;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Filie-se
            </a>

            @auth
                @if(auth()->user()->is_admin ?? false)
                    <a href="{{ route('admin.noticias.create') }}"
                       class="flex items-center justify-center w-8 h-8 bg-black text-white rounded hover:bg-yellow-400 hover:text-black active:bg-yellow-500 transition"
                       title="Criar Post" style="display:inline-flex;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </a>
                @endif
            @endauth

            <div class="relative">
                <button id="profile-btn" title="Perfil"
                        class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 active:bg-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <circle cx="12" cy="8" r="4" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6"/>
                    </svg>
                </button>
                <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg py-1 z-50 hidden">
                    @auth
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form-desktop">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Sair</button>
                        </form>
                        @if(auth()->user()->is_admin ?? false)
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Painel Admin</a>
                            <a href="{{ route('admin.noticias.index') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Admin Notícias</a>
                            {{-- <a href="{{ route('admin.usuarios.index') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Usuários</a> --}}
                        @else
                            <a href="{{ route('convocacoes.index') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Minhas Convocações</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Logar</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Registrar</a>
                    @endauth
                </div>
            </div>
            <div class="relative">
                <button id="contact-btn" title="Contato"
                        class="w-8 h-8 flex items-center justify-center rounded hover:bg-yellow-50 active:bg-yellow-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V8a2 2 0 012-2h18a2 2 0 012 2v6a2 2 0 01-2 2z"/>
                    </svg>
                </button>
                <div id="contact-dropdown" class="absolute right-0 mt-2 w-64 bg-white border rounded shadow-lg py-1 z-50 hidden">
                    <a href="mailto:Sinatrandf@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Sinatrandf@sinatrandf.com.br</a>
                    <a href="mailto:Atendimento@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Atendimento@sinatrandf.com.br</a>
                    <a href="mailto:Financeiro@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Financeiro@sinatrandf.com.br</a>
                    <a href="mailto:Juridico@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Juridico@sinatrandf.com.br</a>
                    <a href="mailto:Presidencia@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Presidencia@sinatrandf.com.br</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Menu Mobile --}}
    <div id="navbar-mobile-menu"
         class="sm:hidden hidden w-full px-4 pb-4 flex-col gap-3 animate-slide-down">
        <ul class="flex flex-col gap-2 text-black bg-white rounded-lg shadow-md p-2">
            <li><a href="{{ route('home') }}" class="block py-2 px-3 text-base rounded hover:bg-gray-100">Início</a></li>
            <li><a href="{{ route('sobre') }}" class="block py-2 px-3 text-base rounded hover:bg-gray-100">Sobre</a></li>
            <li><a href="{{ url('/legislacao') }}" class="block py-2 px-3 text-base rounded hover:bg-gray-100">Legislação</a></li>
            <li><a href="{{ route('convocacoes.index') }}" class="block py-2 px-3 text-base rounded hover:bg-gray-100">Convocações</a></li>
        </ul>
    </div>

    {{-- Botões Mobile: linha separada, alinhados à direita --}}
    <div class="sm:hidden flex flex-wrap justify-end gap-2 px-4 mt-1 mb-1">
        <a href="{{ route('filiacao.create') }}"
           class="py-1 px-3 text-xs font-medium border border-yellow-400 text-black bg-yellow-400 rounded flex items-center gap-2 hover:bg-[#dbfc03] hover:text-yellow-900 hover:shadow transition"
           style="background: #fde047; border-radius: 0.375rem; transition: background 0.2s, color 0.2s;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Filie-se
        </a>
        <div class="relative">
            <button id="profile-btn-mobile" title="Perfil"
                    class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <circle cx="12" cy="8" r="4" stroke-width="2"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6"/>
                </svg>
            </button>
            <div id="profile-dropdown-mobile" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg py-1 z-50 hidden">
bur                @auth
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Sair</button>
                    </form>
                    @if(auth()->user()->is_admin ?? false)
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Painel Admin</a>
                        <a href="{{ route('admin.noticias.index') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Admin Notícias</a>
                    @else
                        <a href="{{ route('convocacoes.index') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Minhas Convocações</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Logar</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-black hover:bg-yellow-50 hover:text-yellow-700 active:bg-yellow-100">Registrar</a>
                @endauth
            </div>
        </div>
        <div class="relative">
            <button id="contact-btn-mobile" title="Contato"
                    class="w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V8a2 2 0 012-2h18a2 2 0 012 2v6a2 2 0 01-2 2z"/>
                </svg>
            </button>
            <div id="contact-dropdown-mobile" class="absolute right-0 mt-2 w-64 bg-white border rounded shadow-lg py-1 z-50 hidden">
                <a href="mailto:Sinatrandf@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">Sinatrandf@sinatrandf.com.br</a>
                <a href="mailto:Atendimento@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">Atendimento@sinatrandf.com.br</a>
                <a href="mailto:Financeiro@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">Financeiro@sinatrandf.com.br</a>
                <a href="mailto:Juridico@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">Juridico@sinatrandf.com.br</a>
                <a href="mailto:Presidencia@sinatrandf.com.br" class="block px-4 py-2 text-sm text-black hover:bg-gray-100">Presidencia@sinatrandf.com.br</a>
            </div>
        </div>
    </div>
</nav>

{{-- JavaScript simples para alternar menu mobile --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Garante que o botão hamburguer funcione mesmo após upload/FTP
        var navbarToggle = document.getElementById('navbar-toggle');
        if (navbarToggle) {
            navbarToggle.onclick = function () {
                var mobileMenu = document.getElementById('navbar-mobile-menu');
                if (mobileMenu) {
                    mobileMenu.classList.toggle('hidden');
                }
            };
        }

        // Desktop dropdowns
        function setupDropdown(btnId, dropdownId) {
            const btn = document.getElementById(btnId);
            const dropdown = document.getElementById(dropdownId);
            if (btn && dropdown) {
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                });
                document.addEventListener('click', function (e) {
                    if (!dropdown.contains(e.target) && e.target !== btn) {
                        dropdown.classList.add('hidden');
                    }
                });
            }
        }
        setupDropdown('profile-btn', 'profile-dropdown');
        setupDropdown('contact-btn', 'contact-dropdown');

        // Mobile dropdowns
        function setupDropdownMobile(btnId, dropdownId) {
            const btn = document.getElementById(btnId);
            const dropdown = document.getElementById(dropdownId);
            if (btn && dropdown) {
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                });
                document.addEventListener('click', function (e) {
                    if (!dropdown.contains(e.target) && e.target !== btn) {
                        dropdown.classList.add('hidden');
                    }
                });
            }
        }
        setupDropdownMobile('profile-btn-mobile', 'profile-dropdown-mobile');
        setupDropdownMobile('contact-btn-mobile', 'contact-dropdown-mobile');

        // For logout: after submit, close dropdown and show login/register (simulate for SPA, but for blade, page reloads)
        var logoutForm = document.getElementById('logout-form-desktop');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function() {
                setTimeout(function() {
                    var dropdown = document.getElementById('profile-dropdown');
                    if (dropdown) dropdown.classList.add('hidden');
                }, 100);
            });
        }
    });
</script>
<style>
    /* Garante que os dropdowns fiquem acima do conteúdo e bem posicionados */
    #profile-dropdown, #contact-dropdown,
    #profile-dropdown-mobile, #contact-dropdown-mobile {
        min-width: 180px;
        max-width: 90vw;
    }
    @media (max-width: 640px) {
        #profile-dropdown-mobile, #contact-dropdown-mobile {
            right: 0;
            left: auto;
        }
    }

    /* Diagnóstico: Força o ícone do menu a aparecer */
    .menu-svg-force-visible, .menu-svg-force-visible * {
        display: inline-block !important;
        opacity: 1 !important;
        visibility: visible !important;
        width: 2.5rem !important;
        height: 2.5rem !important;
        color: #000 !important;
        stroke: #000 !important;
    }
</style>
