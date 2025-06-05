@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Card de total de notícias --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-2">Total de Notícias</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $totalNoticias ?? '0' }}</p>
        </div>

        {{-- Outros cards futuros --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-2">Usuários Online</h2>
            <p class="text-3xl font-bold text-green-600">0</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-lg font-semibold mb-2">Categorias</h2>
            <p class="text-3xl font-bold text-purple-600">0</p>
        </div>
    </div>
@endsection
