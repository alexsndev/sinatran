<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulário de Filiação SINATRAN-DF</title>
    <style>
        /* Copia exatamente o CSS que você já tem */
        .form-container {
            max-width: 1300px;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
            border-radius: 10px;
            font-family: Arial, sans-serif;
        }

        .form-container h2 {
            text-align: center;
        }

        .form-container .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .dependente-section {
            margin-top: 20px;
            padding: 15px;
            border: 1px dashed #aaa;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .dependente-section h3 {
            margin-top: 0;
        }

        .termo-container {
            margin-top: 30px;
            padding: 15px;
            border: 1px solid #000;
            border-radius: 5px;
            background-color: #f1f1f1;
        }

        .termo-container input[type="checkbox"] {
            margin-right: 5px;
        }

        .termo-container ol li {
            margin-bottom: 10px;
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-8 py-10">
    <div class="bg-white/90 border border-gray-200 rounded-xl p-8 md:p-12 shadow-none">
        <h2 class="text-3xl font-extrabold text-center text-blue-800 mb-8 tracking-tight">Formulário de Filiação SINATRAN-DF</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('filiacao.store') }}" method="POST" class="space-y-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div>
                    <label for="cep" class="block text-sm font-semibold text-gray-700 mb-1">CEP</label>
                    <input type="text" id="cep" name="cep" maxlength="9" placeholder="Ex: 70000-000"
                        value="{{ old('cep') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90"
                        required>
                    @error('cep') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="endereco" class="block text-sm font-semibold text-gray-700 mb-1">Endereço</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Ex: Rua das Flores" value="{{ old('endereco') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('endereco') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="bairro" class="block text-sm font-semibold text-gray-700 mb-1">Bairro</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Ex: Centro" value="{{ old('bairro') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('bairro') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="cidade" class="block text-sm font-semibold text-gray-700 mb-1">Cidade</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Ex: Brasília" value="{{ old('cidade') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('cidade') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="uf" class="block text-sm font-semibold text-gray-700 mb-1">UF</label>
                    <select id="uf" name="uf" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90">
                        <option value="" disabled {{ old('uf') ? '' : 'selected' }}>Selecione</option>
                        @foreach(['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'] as $estado)
                            <option value="{{ $estado }}" {{ old('uf') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                        @endforeach
                    </select>
                    @error('uf') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="nome" class="block text-sm font-semibold text-gray-700 mb-1">Nome</label>
                    <input type="text" name="nome" placeholder="Ex: João da Silva" value="{{ old('nome') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('nome') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="matricula" class="block text-sm font-semibold text-gray-700 mb-1">Matrícula</label>
                    <input type="text" name="matricula" placeholder="Ex: 123456" value="{{ old('matricula') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('matricula') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="rg" class="block text-sm font-semibold text-gray-700 mb-1">RG</label>
                    <input type="text" name="rg" placeholder="Ex: 123456789" value="{{ old('rg') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('rg') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="orgao_expedidor" class="block text-sm font-semibold text-gray-700 mb-1">Órgão Expedidor</label>
                    <input type="text" name="orgao_expedidor" placeholder="Ex: SSP-DF" value="{{ old('orgao_expedidor') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('orgao_expedidor') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="cpf" class="block text-sm font-semibold text-gray-700 mb-1">CPF</label>
                    <input type="text" name="cpf" placeholder="Ex: 000.000.000-00" value="{{ old('cpf') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('cpf') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="data_nascimento" class="block text-sm font-semibold text-gray-700 mb-1">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90">
                    @error('data_nascimento') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="naturalidade" class="block text-sm font-semibold text-gray-700 mb-1">Naturalidade</label>
                    <input type="text" name="naturalidade" placeholder="Ex: Brasília" value="{{ old('naturalidade') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('naturalidade') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="tipo_sanguineo" class="block text-sm font-semibold text-gray-700 mb-1">Tipo Sanguíneo</label>
                    <input type="text" name="tipo_sanguineo" placeholder="Ex: O+" value="{{ old('tipo_sanguineo') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('tipo_sanguineo') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="sexo" class="block text-sm font-semibold text-gray-700 mb-1">Sexo</label>
                    <select name="sexo"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90">
                        <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>Selecione</option>
                        <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Feminino" {{ old('sexo') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                        <option value="Outro" {{ old('sexo') == 'Outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('sexo') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="filiacao_pai" class="block text-sm font-semibold text-gray-700 mb-1">Filiação Pai</label>
                    <input type="text" name="filiacao_pai" placeholder="Nome do Pai" value="{{ old('filiacao_pai') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('filiacao_pai') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="filiacao_mae" class="block text-sm font-semibold text-gray-700 mb-1">Filiação Mãe</label>
                    <input type="text" name="filiacao_mae" placeholder="Nome da Mãe" value="{{ old('filiacao_mae') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('filiacao_mae') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="cargo" class="block text-sm font-semibold text-gray-700 mb-1">Cargo</label>
                    <input type="text" name="cargo" placeholder="Cargo" value="{{ old('cargo') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('cargo') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="data_admissao" class="block text-sm font-semibold text-gray-700 mb-1">Data Admissão</label>
                    <input type="date" name="data_admissao" value="{{ old('data_admissao') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90">
                    @error('data_admissao') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="situacao_servidor" class="block text-sm font-semibold text-gray-700 mb-1">Situação Servidor</label>
                    <input type="text" name="situacao_servidor" placeholder="Ex: Ativo" value="{{ old('situacao_servidor') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('situacao_servidor') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="telefone1" class="block text-sm font-semibold text-gray-700 mb-1">Telefone 1</label>
                    <input type="text" name="telefone1" placeholder="(61) 99999-9999" value="{{ old('telefone1') }}" required
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('telefone1') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="telefone2" class="block text-sm font-semibold text-gray-700 mb-1">Telefone 2</label>
                    <input type="text" name="telefone2" placeholder="(61) 99999-9999" value="{{ old('telefone2') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('telefone2') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="email_funcional" class="block text-sm font-semibold text-gray-700 mb-1">Email Funcional</label>
                    <input type="email" name="email_funcional" placeholder="exemplo@funcional.com" value="{{ old('email_funcional') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('email_funcional') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="email_pessoal" class="block text-sm font-semibold text-gray-700 mb-1">Email Pessoal</label>
                    <input type="email" name="email_pessoal" placeholder="exemplo@pessoal.com" value="{{ old('email_pessoal') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('email_pessoal') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="estado_civil" class="block text-sm font-semibold text-gray-700 mb-1">Estado Civil</label>
                    <select name="estado_civil"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90">
                        <option value="" disabled {{ old('estado_civil') ? '' : 'selected' }}>Selecione</option>
                        @foreach(['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)', 'Separado(a)'] as $estadoCivil)
                            <option value="{{ $estadoCivil }}" {{ old('estado_civil') == $estadoCivil ? 'selected' : '' }}>{{ $estadoCivil }}</option>
                        @endforeach
                    </select>
                    @error('estado_civil') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="escolaridade" class="block text-sm font-semibold text-gray-700 mb-1">Escolaridade</label>
                    <select name="escolaridade"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90">
                        <option value="" disabled {{ old('escolaridade') ? '' : 'selected' }}>Selecione</option>
                        @foreach(['Fundamental', 'Médio', 'Superior', 'Pós-graduação', 'Mestrado', 'Doutorado'] as $escolaridade)
                            <option value="{{ $escolaridade }}" {{ old('escolaridade') == $escolaridade ? 'selected' : '' }}>{{ $escolaridade }}</option>
                        @endforeach
                    </select>
                    @error('escolaridade') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="formacao" class="block text-sm font-semibold text-gray-700 mb-1">Formação</label>
                    <input type="text" name="formacao" placeholder="Ex: Engenharia" value="{{ old('formacao') }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90">
                    @error('formacao') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
                <div>
                    <label for="quantidade_dependentes" class="block text-sm font-semibold text-gray-700 mb-1">Quantidade de Dependentes</label>
                    <select name="quantidade_dependentes" id="quantidade_dependentes" onchange="toggleDependentes()"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90">
                        <option value="0" {{ old('quantidade_dependentes') == '0' ? 'selected' : '' }}>0</option>
                        @for($i=1; $i<=9; $i++)
                            <option value="{{ $i }}" {{ old('quantidade_dependentes') == (string)$i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('quantidade_dependentes') <small class="text-red-500">{{ $message }}</small> @enderror
                </div>
            </div>

            <div id="dependentes-container" class="space-y-4">
                @php
                    $qtd = old('quantidade_dependentes', 0);
                @endphp

                @for ($i = 1; $i <= $qtd; $i++)
                <div class="dependente-section bg-gray-50 rounded-lg p-4 border border-gray-200 shadow">
                    <h3 class="text-base font-semibold text-blue-700 mb-2">Dependente {{ $i }}</h3>
                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="dependente_nome_{{ $i }}">Nome:</label>
                    <input type="text" name="dependente_nome_{{ $i }}" value="{{ old("dependente_nome_$i") }}" placeholder="Nome do dependente {{ $i }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90 mb-2" />

                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="dependente_parentesco_{{ $i }}">Parentesco:</label>
                    <input type="text" name="dependente_parentesco_{{ $i }}" value="{{ old("dependente_parentesco_$i") }}" placeholder="Parentesco"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90 mb-2" />

                    <label class="block text-sm font-semibold text-gray-700 mb-1" for="dependente_data_nascimento_{{ $i }}">Data de Nascimento:</label>
                    <input type="date" name="dependente_data_nascimento_{{ $i }}" value="{{ old("dependente_data_nascimento_$i") }}"
                        class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90" />
                </div>
                @endfor
            </div>

            <div class="termo-container bg-blue-50 border border-blue-200 rounded-lg p-6 mt-8">
                <h3 class="text-lg font-bold mb-3 text-blue-800">Termo de Responsabilidade</h3>
                <ol class="list-decimal list-inside text-gray-700 space-y-2 mb-4">
                    <li>Declaro que todas as informações fornecidas são verdadeiras e completas.</li>
                    <li>Estou ciente das normas e regulamentos da SINATRAN-DF.</li>
                    <li>Comprometo-me a cumprir todas as exigências legais para a filiação.</li>
                    <li>Autorizo a verificação dos dados fornecidos para fins de comprovação.</li>
                    <li>Declaro que não possuo pendências legais que possam impedir minha filiação.</li>
                </ol>
                <div class="flex items-center gap-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="autoriza_envio" value="sim" id="autoriza_envio"
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                            {{ old('autoriza_envio') == 'sim' ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Autorizo o envio de comunicações e informações.</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="nao_autoriza_envio" value="sim" id="nao_autoriza_envio"
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                            {{ old('nao_autoriza_envio') == 'sim' ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Não autorizo o envio de comunicações.</span>
                    </label>
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit"
                    class="inline-flex items-center gap-2 bg-[#dbfc03] text-black font-bold py-3 px-10 rounded-lg border border-[#dbfc03] hover:bg-yellow-300 transition text-base"
                    style="letter-spacing: 0.05em;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="uppercase font-bold">Enviar</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleDependentes() {
        const qtd = parseInt(document.getElementById('quantidade_dependentes').value);
        const container = document.getElementById('dependentes-container');
        container.innerHTML = '';

        for(let i=1; i <= qtd; i++) {
            const div = document.createElement('div');
            div.classList.add('dependente-section', 'bg-gray-50', 'rounded-lg', 'p-4', 'border', 'border-gray-200', 'shadow');
            div.innerHTML = `
                <h3 class="text-base font-semibold text-blue-700 mb-2">Dependente ${i}</h3>
                <label class="block text-sm font-semibold text-gray-700 mb-1" for="dependente_nome_${i}">Nome:</label>
                <input type="text" name="dependente_nome_${i}" placeholder="Nome do dependente ${i}"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90 mb-2" />
                <label class="block text-sm font-semibold text-gray-700 mb-1" for="dependente_parentesco_${i}">Parentesco:</label>
                <input type="text" name="dependente_parentesco_${i}" placeholder="Parentesco"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition placeholder-gray-400 bg-white/90 mb-2" />
                <label class="block text-sm font-semibold text-gray-700 mb-1" for="dependente_data_nascimento_${i}">Data de Nascimento:</label>
                <input type="date" name="dependente_data_nascimento_${i}"
                    class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 px-4 py-2 transition bg-white/90" />
            `;
            container.appendChild(div);
        }
    }
</script>
@endsection
</body>
</html>
