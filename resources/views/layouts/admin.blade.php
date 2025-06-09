<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, .bg-white, .bg-gray-50, .rounded-xl, .shadow-xl, .border, .max-w-5xl, .p-6, .p-8, .px-4, .py-8 {
            background: #fff !important;
            color: #222 !important;
        }
        .sidebar-link, .text-black, .text-gray-900, .text-gray-700, .text-white, .dark\:text-white {
            color: #222 !important;
        }
        .sidebar-link:hover, .hover\:bg-blue-50:hover {
            background: #f3f4f6 !important;
            color: #111 !important;
        }
        .bg-blue-50, .hover\:bg-blue-50:hover {
            background: #f0f6ff !important;
        }
        .bg-yellow-100, .hover\:bg-yellow-100:hover {
            background: #fef9c3 !important;
        }
        .bg-green-100, .hover\:bg-green-100:hover {
            background: #dcfce7 !important;
        }
        .bg-red-100, .hover\:bg-red-100:hover {
            background: #fee2e2 !important;
        }
        .bg-gray-200, .hover\:bg-gray-200:hover {
            background: #e5e7eb !important;
        }
        .border, .border-gray-200 {
            border-color: #e5e7eb !important;
        }
        .rounded-xl, .rounded-lg {
            border-radius: 1rem !important;
        }
        .font-bold, .font-extrabold, .font-semibold {
            color: #222 !important;
        }
        .sidebar-link.active, .sidebar-link[aria-current="page"] {
            background: #e0e7ff !important;
            color: #1d4ed8 !important;
        }
        .shadow, .shadow-lg, .shadow-xl {
            box-shadow: 0 2px 8px 0 #e5e7eb !important;
        }
        .text-green-800, .text-yellow-800, .text-red-800, .text-blue-800 {
            color: #222 !important;
        }
        .text-gray-400, .text-gray-500 {
            color: #888 !important;
        }
        .hover\:text-blue-900:hover, .hover\:text-yellow-900:hover {
            color: #1d4ed8 !important;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white" style="color: #222 !important;">
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-lg border-r border-gray-200 flex flex-col">
            <div class="p-6 font-extrabold text-xl border-b border-gray-200 text-black tracking-tight">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 3v4M8 3v4M4 11h16"/>
                    </svg>
                    Painel Admin
                </span>
            </div>
            <nav class="flex-1 p-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="sidebar-link block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2 hover:bg-blue-50"
                   style="color: #222 !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5"/>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.noticias.index') }}"
                   class="sidebar-link block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2 hover:bg-blue-50"
                   style="color: #222 !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3v4M8 3v4M4 11h16"/>
                    </svg>
                    Notícias
                </a>
                <a href="{{ route('admin.categorias.index') }}"
                   class="sidebar-link block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2 hover:bg-blue-50"
                   style="color: #222 !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h8M12 8v8"/>
                    </svg>
                    Categorias
                </a>
                <a href="{{ url('/') }}"
                   class="sidebar-link block px-4 py-2 rounded-lg font-medium transition flex items-center gap-2 hover:bg-blue-50"
                   style="color: #222 !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0a2 2 0 002-2V7a2 2 0 00-2-2h-3.5"/>
                    </svg>
                    Home
                </a>
                {{-- Adicione outros links conforme necessário --}}
            </nav>
        </aside>

        {{-- Conteúdo principal --}}
        <main class="flex-1 p-0 sm:p-6 bg-white min-h-screen transition-colors duration-300">
            <div class="max-w-5xl mx-auto px-4 py-8">
                <h1 class="text-3xl font-extrabold mb-6" style="color: #222 !important;">@yield('title')</h1>

                @if(session('success'))
                    <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800 border border-green-200 shadow">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="rounded-xl shadow-xl bg-white border border-gray-200 p-6" style="color: #222 !important;">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
