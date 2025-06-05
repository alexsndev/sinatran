@extends('layouts.public')

@section('title', 'Contato')

@section('content')
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <section class="max-w-md mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Fale Conosco</h1>

        <form action="{{ route('contato.enviar') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nome" class="block mb-1 font-semibold">Nome</label>
                <input type="text" id="nome" name="nome" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="email" class="block mb-1 font-semibold">E-mail</label>
                <input type="email" id="email" name="email" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="mensagem" class="block mb-1 font-semibold">Mensagem</label>
                <textarea id="mensagem" name="mensagem" rows="5" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition font-semibold">
                Enviar
            </button>
        </form>
    </section>
@endsection
