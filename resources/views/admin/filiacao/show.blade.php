@extends('layouts.admin')

@section('title', 'Detalhes da Filiação')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow border border-gray-200 p-8">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Detalhes da Filiação</h2>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
            <div>
                <dt class="font-semibold text-gray-700">Nome</dt>
                <dd>{{ $filiacao->nome }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">CPF</dt>
                <dd>{{ $filiacao->cpf }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Matrícula</dt>
                <dd>{{ $filiacao->matricula }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Telefone</dt>
                <dd>{{ $filiacao->telefone1 }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">E-mail Pessoal</dt>
                <dd>{{ $filiacao->email_pessoal }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">E-mail Funcional</dt>
                <dd>{{ $filiacao->email_funcional }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Endereço</dt>
                <dd>{{ $filiacao->endereco }}, {{ $filiacao->bairro }}, {{ $filiacao->cidade }} - {{ $filiacao->uf }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Situação Servidor</dt>
                <dd>{{ $filiacao->situacao_servidor }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Data de Nascimento</dt>
                <dd>{{ $filiacao->data_nascimento }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Cargo</dt>
                <dd>{{ $filiacao->cargo }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Estado Civil</dt>
                <dd>{{ $filiacao->estado_civil }}</dd>
            </div>
            <div>
                <dt class="font-semibold text-gray-700">Escolaridade</dt>
                <dd>{{ $filiacao->escolaridade }}</dd>
            </div>
            <!-- Adicione outros campos conforme necessário -->
        </dl>
        <div class="mt-6">
            <h3 class="font-bold text-blue-800 mb-2">Dependentes</h3>
            @if($filiacao->dependentes->count())
                <ul class="list-disc ml-6">
                    @foreach($filiacao->dependentes as $dep)
                        <li>
                            <span class="font-semibold">{{ $dep->nome }}</span>
                            <span class="text-gray-500">({{ $dep->parentesco }}, {{ $dep->data_nascimento }})</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <span class="text-gray-500">Nenhum dependente cadastrado.</span>
            @endif
        </div>
        <div class="mt-8 flex gap-2">
            <a href="{{ route('admin.filiacao.edit', $filiacao->id) }}" class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500 transition">Editar</a>
            <a href="{{ route('admin.filiacao.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">Voltar</a>
        </div>
    </div>
</div>
@endsection
