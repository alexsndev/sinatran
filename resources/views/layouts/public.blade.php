<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SINATRAN-DF')</title>
    @vite('resources/css/app.css') {{-- Garante que o Tailwind funcione --}}
    <!-- Estilos, Bootstrap CSS etc -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen bg-white text-gray-800">

    @include('layouts.components.navbar')

    <main class="flex-1 container mx-auto px-4 py-6">
        @yield('content')
    </main>

    @include('layouts.components.footer')

</body>
</html>
