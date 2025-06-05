<h1 class="text-3xl font-bold mb-8 text-center">Categorias</h1>

@foreach ($categorias as $categoria)
    <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-4 text-blue-700">{{ $categoria->nome }}</h2>

        @if ($categoria->noticias->count())
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-4">
                @foreach ($categoria->noticias as $post)
                    <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition">
                        <h3 class="font-semibold text-lg mb-2">{{ $post->titulo }}</h3>
                        <p class="text-gray-600 line-clamp-3">
                            {{ $post->resumo ?? \Illuminate\Support\Str::limit(strip_tags($post->conteudo), 100) }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Nenhum post encontrado na categoria {{ $categoria->nome }}.</p>
        @endif
    </div>
@endforeach
