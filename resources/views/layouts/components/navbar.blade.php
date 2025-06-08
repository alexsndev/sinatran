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
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div class="flex items-center h-full">
            <ul id="navbar-menu" class="hidden sm:flex flex-col sm:flex-row gap-2 sm:gap-6 text-black bg-white absolute sm:static left-0 right-0 top-16 sm:top-auto z-40 px-2 sm:px-0 py-2 sm:py-0 border-b sm:border-0 transition-all duration-200 ease-in-out items-center">
                <li><a href="{{ route('home') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Início</a></li>
                <li><a href="{{ route('sobre') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Sobre</a></li>
                <li><a href="{{ url('/legislacao') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Legislação</a></li>
                <li><a href="{{ route('convocacoes.index') }}" class="block py-1 px-3 rounded hover:bg-gray-100 hover:text-black no-underline">Convocações</a></li>
                <li>
                    <a href="{{ route('filiacao.create') }}"
                        class="block py-1 px-3 rounded border border-blue-500 text-blue-600 bg-white hover:bg-blue-50 hover:text-blue-700 transition no-underline text-sm font-medium"
                        style="margin-left: 0.5rem;">
                        Filie-se
                    </a>
                </li>
                <!-- Ícone de contato (email) sempre público -->
                <li class="relative group" style="position: relative;">
                    <button type="button" id="contact-btn"
                        style="display: flex; align-items: center; gap: 0.3rem; padding: 0.3rem 0.75rem; border-radius: 0.375rem; background: transparent; border: none; cursor: pointer;"
                        title="Contato"
                        aria-haspopup="true" aria-expanded="false">
                        <!-- Ícone envelope -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 24px; height: 24px; color: black; flex-shrink: 0;"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V8a2 2 0 012-2h18a2 2 0 012 2v6a2 2 0 01-2 2z" />
                        </svg>
                        <!-- Seta para baixo -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 16px; height: 16px; color: black;"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="contact-dropdown"
                        style="position: absolute; right: 0; margin-top: 0.5rem; width: 320px; background: white; border: 1px solid #ddd; border-radius: 0.375rem; box-shadow: 0 4px 6px rgb(0 0 0 / 0.1); padding: 0.5rem 0; list-style: none; display: none; z-index: 9999;">
                        <!-- Cada item -->
                        <li>
                            <a href="mailto:Sinatrandf@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Sinatrandf@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Atendimento@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Atendimento@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Financeiro@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Financeiro@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Juridico@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Juridico@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Presidencia@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Presidencia@sinatrandf.com.br
                            </a>
                        </li>
                    </ul>
                </li>
                @auth
                @if(auth()->user()->is_admin ?? false)
                <li>
                    <a href="{{ route('admin.noticias.create') }}" class="flex items-center py-1 px-3 rounded bg-black text-white hover:bg-gray-800 hover:text-white transition no-underline" title="Criar Post">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Novo Post
                    </a>
                </li>
                @endif
                <li class="relative group">
                    <button type="button" id="profile-btn" class="flex items-center py-1 px-3 rounded hover:bg-gray-100 hover:text-black focus:outline-none" title="Perfil">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="8" r="4" stroke-width="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6" />
                        </svg>
                    </button>
                    <ul id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg py-1 z-50 hidden pl-0">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-black hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Perfil
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                    </svg>
                                    Sair
                                </button>
                            </form>
                        </li>

                        <!-- Botão Toggle no nav -->
                        <nav>
                            <label class="switch">
                                <input type="checkbox" id="toggle-darkmode" />
                                <span class="slider"></span>
                            </label>
                        </nav>

                        <style>
                            /* Container do toggle */
                            .switch {
                                position: relative;
                                display: inline-block;
                                width: 40px;
                                height: 22px;
                                margin-left: 20px;
                                /* Espaço no nav */
                            }

                            /* Esconde o checkbox */
                            .switch input {
                                opacity: 0;
                                width: 0;
                                height: 0;
                            }

                            /* O “slider” que aparece */
                            .slider {
                                position: absolute;
                                cursor: pointer;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                background-color: #ccc;
                                border-radius: 22px;
                                transition: 0.4s;
                            }

                            /* A bolinha do toggle */
                            .slider::before {
                                position: absolute;
                                content: "";
                                height: 18px;
                                width: 18px;
                                left: 2px;
                                bottom: 2px;
                                background-color: white;
                                border-radius: 50%;
                                transition: 0.4s;
                            }

                            /* Quando ativo (dark mode) */
                            input:checked+.slider {
                                background-color: #555;
                            }

                            input:checked+.slider::before {
                                transform: translateX(18px);
                            }
                        </style>

                        <script>
                            const toggle = document.getElementById('toggle-darkmode');

                            // Ao carregar a página, aplica o tema salvo (se houver)
                            if (localStorage.getItem('darkmode') === 'true') {
                                document.body.classList.add('dark-mode');
                                toggle.checked = true;
                            }

                            toggle.addEventListener('change', () => {
                                document.body.classList.toggle('dark-mode');
                                localStorage.setItem('darkmode', toggle.checked);
                            });
                        </script>

                        <style>
                            /* Defina aqui os estilos do dark mode */
                            body.dark-mode {
                                background-color: #121212;
                                color: #e0e0e0;
                            }

                            /* Você pode ajustar seu nav e outros elementos */
                            nav {
                                background: #f5f5f5;
                                padding: 10px 20px;
                            }

                            body.dark-mode nav {
                                background: #222;
                            }
                        </style>


                        @if(auth()->user()->is_admin ?? false)
                        <li>
                            <button type="button" onclick="window.location='{{ route('admin.dashboard') }}'" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3v4M8 3v4M4 11h16" />
                                </svg>
                                Painel Admin
                            </button>
                        </li>
                        <li>
                            <button type="button" onclick="window.location='{{ route('admin.noticias.index') }}'" class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3v4M8 3v4M4 11h16" />
                                </svg>
                                Admin Notícias
                            </button>
                        </li>
                        @endif
                    </ul>
                    <!-- CONTATO LISTA DE DROPDOWN -->
                <li class="relative group" style="position: relative;">
                    <button type="button" id="contact-btn"
                        style="display: flex; align-items: center; gap: 0.3rem; padding: 0.3rem 0.75rem; border-radius: 0.375rem; background: transparent; border: none; cursor: pointer;"
                        title="Contato"
                        aria-haspopup="true" aria-expanded="false">
                        <!-- Ícone envelope -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 24px; height: 24px; color: black; flex-shrink: 0;"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V8a2 2 0 012-2h18a2 2 0 012 2v6a2 2 0 01-2 2z" />
                        </svg>

                        <!-- Seta para baixo -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            style="width: 16px; height: 16px; color: black;"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <ul id="contact-dropdown"
                        style="position: absolute; right: 0; margin-top: 0.5rem; width: 320px; background: white; border: 1px solid #ddd; border-radius: 0.375rem; box-shadow: 0 4px 6px rgb(0 0 0 / 0.1); padding: 0.5rem 0; list-style: none; display: none; z-index: 9999;">
                        <!-- Cada item -->
                        <li>
                            <a href="mailto:Sinatrandf@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Sinatrandf@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Atendimento@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Atendimento@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Financeiro@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Financeiro@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Juridico@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Juridico@sinatrandf.com.br
                            </a>
                        </li>
                        <li>
                            <a href="mailto:Presidencia@sinatrandf.com.br"
                                style="display: flex; align-items: center; gap: 0.5rem; padding: 0.4rem 1rem; text-decoration: none; color: #111;"
                                onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="width: 20px; height: 20px; color: #2563eb; flex-shrink: 0;"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12h.01M8 12h.01M12 12h.01M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7M3 7h18M3 7l9 6 9-6" />
                                </svg>
                                Presidencia@sinatrandf.com.br
                            </a>
                        </li>
                    </ul>
                </li>
                </li>
                @else
                <li class="relative group">
                    <button type="button" id="profile-btn" class="flex items-center py-1 px-3 rounded hover:bg-gray-100 hover:text-black focus:outline-none" title="Perfil">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="8" r="4" stroke-width="2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20c0-3.314 3.582-6 8-6s8 2.686 8 6" />
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
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('navbar-toggle');
            const menu = document.getElementById('navbar-menu');
            toggle?.addEventListener('click', function() {
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




        document.addEventListener('DOMContentLoaded', function() {
            const contactBtn = document.getElementById('contact-btn');
            const contactDropdown = document.getElementById('contact-dropdown');

            if (contactBtn && contactDropdown) {
                contactBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isHidden = contactDropdown.style.display === 'none' || contactDropdown.style.display === '';
                    contactDropdown.style.display = isHidden ? 'block' : 'none';
                    contactBtn.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
                });

                document.addEventListener('click', function(e) {
                    if (!contactDropdown.contains(e.target) && e.target !== contactBtn) {
                        contactDropdown.style.display = 'none';
                        contactBtn.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    </script>
</nav>