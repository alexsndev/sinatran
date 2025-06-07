@extends('layouts.admin')

@section('title', 'Gerenciar Notícias')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Notícias</h1>
        <a href="{{ route('admin.noticias.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition font-semibold dark:bg-blue-500 dark:hover:bg-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nova Notícia
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-900 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-200 uppercase text-xs">
                <tr>
                    <th class="p-4 font-semibold">Título</th>
                    <th class="p-4 font-semibold">Categoria</th>
                    <th class="p-4 font-semibold">Publicado em</th>
                    <th class="p-4 font-semibold text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($noticias as $noticia)
                    <tr class="border-t border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        <td class="p-4 font-medium text-gray-900 dark:text-gray-100">
                            @php
                                $urlImagem = null;
                                if (!empty($noticia->imagem)) {
                                    if (filter_var($noticia->imagem, FILTER_VALIDATE_URL)) {
                                        $urlImagem = $noticia->imagem;
                                    } else {
                                        $urlImagem = asset('storage/' . $noticia->imagem);
                                    }
                                }
                            @endphp

                            @if ($urlImagem)
                                <img src="{{ $urlImagem }}" alt="{{ $noticia->titulo }}" class="w-24 h-16 object-cover rounded">
                            @endif

                            {{ $noticia->titulo }}
                        </td>
                        <td class="p-4 text-gray-700 dark:text-gray-300">{{ $noticia->categoria->nome ?? 'Sem categoria' }}</td>
                        <td class="p-4 text-gray-500 dark:text-gray-400">
                            {{ $noticia->created_at ? $noticia->created_at->format('d/m/Y') : '—' }}
                        </td>
                        <td class="p-4 flex flex-col sm:flex-row gap-2 justify-center items-center">
                            <a href="{{ route('admin.noticias.edit', $noticia->id) }}"
                               class="inline-flex items-center gap-1 text-yellow-700 hover:text-yellow-900 bg-yellow-100 hover:bg-yellow-200 dark:text-yellow-400 dark:bg-yellow-900/30 dark:hover:bg-yellow-900/60 px-3 py-1 rounded transition font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h6"/>
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('admin.noticias.destroy', $noticia->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center gap-1 text-red-700 hover:text-red-900 bg-red-100 hover:bg-red-200 dark:text-red-400 dark:bg-red-900/30 dark:hover:bg-red-900/60 px-3 py-1 rounded transition font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-500 dark:text-gray-400">Nenhuma notícia encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6 flex justify-center">
            {{ $noticias->links() }}
        </div>
    </div>
@endsection
