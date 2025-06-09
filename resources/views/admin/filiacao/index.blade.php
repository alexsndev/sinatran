{{-- filepath: c:\Users\Alexandre Rodrigues\Desktop\alexandresinatran\resources\views\admin\filiacao\index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Filiações')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-blue-900">Filiações</h1>
        <form method="GET" action="{{ route('admin.filiacao.index') }}" class="flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar por nome ou CPF"
                class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-200" />
            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">Buscar</button>
        </form>
    </div>
    <div class="overflow-x-auto bg-white rounded-xl shadow border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Nome</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">CPF</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Matrícula</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Telefone</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Dependentes</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($filiacoes as $filiacao)
                <tr class="hover:bg-blue-50 transition">
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $filiacao->nome }}</td>
                    <td class="px-4 py-3">{{ $filiacao->cpf }}</td>
                    <td class="px-4 py-3">{{ $filiacao->matricula }}</td>
                    <td class="px-4 py-3">{{ $filiacao->telefone1 }}</td>
                    <td class="px-4 py-3">
                        @php
                            $status = [
                                'ativo' => ['label' => 'Ativo', 'color' => 'green'],
                                'nao_ativo' => ['label' => 'Não Ativo', 'color' => 'gray'],
                                'pagamento_pendente' => ['label' => 'Pagamento Pendente', 'color' => 'yellow'],
                                'cancelado' => ['label' => 'Cancelado', 'color' => 'red'],
                            ];
                            $s = $status[$filiacao->status_filiacao ?? 'ativo'] ?? $status['ativo'];
                        @endphp
                        <span class="inline-block px-2 py-1 rounded text-xs font-semibold bg-{{ $s['color'] }}-100 text-{{ $s['color'] }}-800">
                            {{ $s['label'] }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        @if($filiacao->dependentes->count())
                            <button type="button" onclick="toggleDependentes({{ $filiacao->id }})"
                                class="text-blue-700 underline hover:text-blue-900">Ver ({{ $filiacao->dependentes->count() }})</button>
                            <div id="dependentes-{{ $filiacao->id }}" class="hidden mt-2 text-xs bg-gray-50 rounded p-2 border border-gray-200">
                                <ul>
                                    @foreach($filiacao->dependentes as $dep)
                                        <li class="mb-1">
                                            <span class="font-semibold">{{ $dep->nome }}</span>
                                            <span class="text-gray-500">({{ $dep->parentesco }}, {{ $dep->data_nascimento }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <span class="text-gray-400">Nenhum</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.filiacao.show', $filiacao->id) }}"
                           class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition"
                           title="Ver detalhes">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                        <a href="{{ route('admin.filiacao.edit', $filiacao->id) }}"
                           class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-800 rounded hover:bg-yellow-200 transition"
                           title="Editar">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h6"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.filiacao.destroy', $filiacao->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta filiação?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-2 py-1 bg-red-100 text-red-800 rounded hover:bg-red-200 transition" title="Excluir">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-400">Nenhuma filiação encontrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $filiacoes->withQueryString()->links() }}
    </div>
</div>
<script>
    function toggleDependentes(id) {
        const el = document.getElementById('dependentes-' + id);
        if (el) el.classList.toggle('hidden');
    }
</script>
@endsection
