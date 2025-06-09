<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ficha de Filiação</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #333; padding: 4px; }
        .section-title { background: #eee; font-weight: bold; }
        .termo-container { background: #f1f1f1; border: 1px solid #000; border-radius: 5px; padding: 15px; margin-top: 25px; }
        .termo-container ol { margin: 1em 0 1em 1.2em; }
        .termo-container li { margin-bottom: 8px; }
        .autorizacoes { margin: 1em 0; }
        .autorizacoes span { display: inline-block; margin-right: 20px; }
    </style>
</head>
<body>
    <h1>Ficha de Filiação</h1>

    {{-- Logo no topo --}}
    <div style="text-align: center; margin-bottom: 20px;">
        @if(!empty($data['logo_path']))
    <img src="{{ $data['logo_path'] }}" alt="SINATRANDF" style="max-width: 200px;">
@endif
    </div>

    <table>
        <tr class="section-title"><td colspan="4">Dados Pessoais</td></tr>
        <tr>
            <th>Nome</th>
            <td colspan="3">{{ $data['nome'] ?? '' }}</td>
        </tr>
        <tr>
            <th>CPF</th>
            <td>{{ $data['cpf'] ?? '' }}</td>
            <th>RG</th>
            <td>{{ $data['rg'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Órgão Expedidor</th>
            <td>{{ $data['orgao_expedidor'] ?? '' }}</td>
            <th>Data de Nascimento</th>
            <td>{{ $data['data_nascimento'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Naturalidade</th>
            <td>{{ $data['naturalidade'] ?? '' }}</td>
            <th>Sexo</th>
            <td>{{ $data['sexo'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Tipo Sanguíneo</th>
            <td>{{ $data['tipo_sanguineo'] ?? '' }}</td>
            <th>Estado Civil</th>
            <td>{{ $data['estado_civil'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Filiação Pai</th>
            <td colspan="3">{{ $data['filiacao_pai'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Filiação Mãe</th>
            <td colspan="3">{{ $data['filiacao_mae'] ?? '' }}</td>
        </tr>
    </table>

    <table>
        <tr class="section-title"><td colspan="4">Endereço</td></tr>
        <tr>
            <th>CEP</th>
            <td>{{ $data['cep'] ?? '' }}</td>
            <th>Endereço</th>
            <td>{{ $data['endereco'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Bairro</th>
            <td>{{ $data['bairro'] ?? '' }}</td>
            <th>Cidade</th>
            <td>{{ $data['cidade'] ?? '' }}</td>
        </tr>
        <tr>
            <th>UF</th>
            <td>{{ $data['uf'] ?? '' }}</td>
            <th></th>
            <td></td>
        </tr>
    </table>

    <table>
        <tr class="section-title"><td colspan="4">Contato</td></tr>
        <tr>
            <th>Telefone 1</th>
            <td>{{ $data['telefone1'] ?? '' }}</td>
            <th>Telefone 2</th>
            <td>{{ $data['telefone2'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Email Funcional</th>
            <td>{{ $data['email_funcional'] ?? '' }}</td>
            <th>Email Pessoal</th>
            <td>{{ $data['email_pessoal'] ?? '' }}</td>
        </tr>
    </table>

    <table>
        <tr class="section-title"><td colspan="4">Dados Funcionais</td></tr>
        <tr>
            <th>Matrícula</th>
            <td>{{ $data['matricula'] ?? '' }}</td>
            <th>Cargo</th>
            <td>{{ $data['cargo'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Data de Admissão</th>
            <td>{{ $data['data_admissao'] ?? '' }}</td>
            <th>Situação do Servidor</th>
            <td>{{ $data['situacao_servidor'] ?? '' }}</td>
        </tr>
        <tr>
            <th>Escolaridade</th>
            <td>{{ $data['escolaridade'] ?? '' }}</td>
            <th>Formação</th>
            <td>{{ $data['formacao'] ?? '' }}</td>
        </tr>
    </table>

    <table>
        <tr class="section-title"><td colspan="4">Dependentes</td></tr>
        @php
            $qtd = (int)($data['quantidade_dependentes'] ?? 0);
        @endphp
        <tr>
            <th>Nome</th>
            <th>Parentesco</th>
            <th>Data de Nascimento</th>
            <th></th>
        </tr>
        @for ($i = 1; $i <= $qtd; $i++)
            <tr>
                <td>{{ $data["dependente_nome_$i"] ?? '' }}</td>
                <td>{{ $data["dependente_parentesco_$i"] ?? '' }}</td>
                <td>{{ $data["dependente_data_nascimento_$i"] ?? '' }}</td>
                <td></td>
            </tr>
        @endfor
        @if ($qtd === 0)
            <tr><td colspan="4">Nenhum dependente informado.</td></tr>
        @endif
    </table>

    {{-- Bloco do termo de autorização e ciência --}}
    <div class="termo-container">
        <h3>Autorização e Ciência</h3>
        <ol>
            <li>Declaro ter ciência e aceitar as condições constantes no Estatuto do SINATRAN/DF, comprometendo-me a cumprir todos os atos de minha responsabilidade junto a este sindicato.</li>
            <li>DECLARO que este pedido de filiação está sendo submetido de livre e espontânea vontade e que estou ciente do conteúdo do Estatuto Social do Sindicato dos Agentes de Trânsito do Distrito Federal (SINATRAN-DF), ao qual faço adesão com o presente ato.</li>
            <li>DECLARO estar ciente de que o valor das mensalidades e taxas extraordinárias (contribuições) é aprovado em Assembleia Geral da SINATRAN-DF, sendo as contribuições dos sindicalizados efetivos consignadas diretamente na folha de pagamento e devidas enquanto eu permanecer filiado, mesmo nos meses em que, por qualquer razão, o desconto em folha não for possível.</li>
            <li>DECLARO estar ciente de que, para os sindicalizados conveniados, bem como para os sindicalizados efetivos cujo desconto em folha não seja possível, fica AUTORIZADO o débito em conta bancária, cartão de crédito, ou mesmo emissão de boleto bancário, o que não ocorrendo é de minha responsabilidade o efetivo pagamento.</li>
            <li>AUTORIZO uso dos meus dados pessoais e dados pessoais sensíveis, de acordo com os artigos 7º e 11º da Lei 13.709/2018 – Lei Geral de Proteção de Dados Pessoais (LGPD), e autorizo expressamente o tratamento e o compartilhamento dos meus dados com os colaboradores, parceiros e contratados do SINATRAN-DF, visando à obtenção dos benefícios ofertados pelo sindicato.</li>
            <li>DECLARO que estou ciente que a filiação só se concretizará a partir do pagamento da 1ª mensalidade.</li>
        </ol>

        <div class="autorizacoes">
            <span><strong>Autorização envio mensagens:</strong>
                @if (!empty($data['autoriza_envio']) && $data['autoriza_envio'] === 'sim')
                    Sim
                @elseif (!empty($data['nao_autoriza_envio']) && $data['nao_autoriza_envio'] === 'sim')
                    Não autorizado
                @else
                    Não informado
                @endif
            </span>
        </div>
    </div>

    {{-- Indicação para assinatura digital ou escrita --}}
    <div style="margin-top: 80px; text-align: center;">
        <hr style="width: 300px; margin: 0 auto 10px auto;">
        <p>Assinatura do Filiado (digital ou escrita)</p>
    </div>
</body>
</html>
