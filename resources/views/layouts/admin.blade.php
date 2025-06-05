<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Se estiver usando Vite --}}
    <script>
        // Dark mode toggle (auto by system, but you can add a button if needed)
        if (localStorage.getItem('theme') === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800 dark:bg-[#13151a] dark:text-gray-100 transition-colors duration-300">

    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white dark:bg-[#181a20] shadow-lg border-r border-gray-200 dark:border-[#23262f] hidden md:flex flex-col">
            <div class="p-6 font-extrabold text-xl border-b border-gray-200 dark:border-[#23262f] text-gray-900 dark:text-white tracking-tight">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 3v4M8 3v4M4 11h16"/>
                    </svg>
                    Painel Admin
                </span>
            </div>
            <nav class="flex-1 p-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2
                          text-white dark:text-white hover:bg-blue-50 dark:hover:bg-[#23262f]"
                   style="color: #fff !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.noticias.index') }}"
                   class="block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2
                          text-white dark:text-white hover:bg-blue-50 dark:hover:bg-[#23262f]"
                   style="color: #fff !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3v4M8 3v4M4 11h16"/>
                    </svg>
                    Notícias
                </a>
                <a href="{{ route('admin.categorias.index') }}"
                   class="block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2
                          text-black dark:text-white hover:bg-blue-50 dark:hover:bg-[#23262f]"
                   style="color: #ffffff !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8M12 8v8"/>
                    </svg>
                    Categorias
                </a>
                <a href="{{ url('/') }}"
                   class="block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2
                          text-white dark:text-white hover:bg-blue-50 dark:hover:bg-[#23262f]"
                   style="color: #fff !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5"/>
                    </svg>
                    Home
                </a>
                {{-- Adicione outros links conforme necessário --}}
            </nav>
        </aside>

        {{-- Conteúdo principal --}}
        <main class="flex-1 p-0 sm:p-6 bg-gray-50 dark:bg-[#181a20] min-h-screen transition-colors duration-300">
            <div class="max-w-5xl mx-auto px-4 py-8">
                <h1 class="text-3xl font-extrabold mb-6 text-white dark:text-white tracking-tight">@yield('title')</h1>

                @if(session('success'))
                    <div class="mb-4 p-4 rounded-lg bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-200 border border-green-200 dark:border-green-700 shadow">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="rounded-xl shadow-xl bg-white dark:bg-[#23262f] border border-gray-200 dark:border-[#23262f] p-6 text-white dark:text-white">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
