@extends('layouts.admin')

@section('title', 'Editar Filiação')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow border border-gray-200 p-8">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Editar Filiação</h2>
        <form action="{{ route('admin.filiacao.update', $filiacao->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nome</label>
                    <input type="text" name="nome" value="{{ old('nome', $filiacao->nome) }}" class="w-full rounded border border-gray-300 px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">CPF</label>
                    <input type="text" name="cpf" value="{{ old('cpf', $filiacao->cpf) }}" class="w-full rounded border border-gray-300 px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Matrícula</label>
                    <input type="text" name="matricula" value="{{ old('matricula', $filiacao->matricula) }}" class="w-full rounded border border-gray-300 px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Telefone</label>
                    <input type="text" name="telefone1" value="{{ old('telefone1', $filiacao->telefone1) }}" class="w-full rounded border border-gray-300 px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">E-mail Pessoal</label>
                    <input type="email" name="email_pessoal" value="{{ old('email_pessoal', $filiacao->email_pessoal) }}" class="w-full rounded border border-gray-300 px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">E-mail Funcional</label>
                    <input type="email" name="email_funcional" value="{{ old('email_funcional', $filiacao->email_funcional) }}" class="w-full rounded border border-gray-300 px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status da Filiação</label>
                    <select name="status_filiacao" class="w-full rounded border border-gray-300 px-3 py-2">
                        <option value="ativo" {{ old('status_filiacao', $filiacao->status_filiacao) == 'ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="nao_ativo" {{ old('status_filiacao', $filiacao->status_filiacao) == 'nao_ativo' ? 'selected' : '' }}>Não Ativo</option>
                        <option value="pagamento_pendente" {{ old('status_filiacao', $filiacao->status_filiacao) == 'pagamento_pendente' ? 'selected' : '' }}>Pagamento Pendente</option>
                        <option value="cancelado" {{ old('status_filiacao', $filiacao->status_filiacao) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                    </select>
                </div>
                <!-- Adicione outros campos conforme necessário -->
            </div>
            <div class="mt-6 flex gap-2">
                <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 transition">Salvar</button>
                <a href="{{ route('admin.filiacao.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
