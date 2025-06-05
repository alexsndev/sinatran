<footer class="bg-gray-100 mt-10 border-t">
    <div class="container mx-auto px-4 py-6 text-center text-sm text-gray-600">
        <p>&copy; {{ date('Y') }} Noticiário. Todos os direitos reservados.</p>
        <div class="mt-2 space-x-4">
            <a href="{{ route('sobre') }}" class="hover:text-blue-600">Sobre</a>
            <a href="{{ route('contato') }}" class="hover:text-blue-600">Contato</a>
        </div>
    </div>
</footer>
