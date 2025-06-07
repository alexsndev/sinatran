@extends('layouts.public')

@section('title', 'Sobre')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-12 bg-white rounded-xl ">
    <!-- Título principal -->
    <h1 class="text-4xl font-extrabold text-gray-900 mb-10 border-b-4 border-gray-900 pb-3 text-center">
        Sobre a SINATRAN
    </h1>

    <!-- Missão, Visão e Valores container -->
    <div class="space-y-12">
        <!-- Missão -->
        <article class="flex gap-6 items-start">
            <div class="flex-shrink-0 p-3 rounded-full bg-gray-200 text-gray-900">
                <!-- Icone moderno e simples -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 11c1.104 0 2-.672 2-1.5S13.104 8 12 8s-2 .672-2 1.5.896 1.5 2 1.5z"/>
                    <path d="M20 21v-2a4 4 0 00-3-3.87M4 21v-2a4 4 0 013-3.87M16 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">Missão</h2>
                <p class="text-gray-700 leading-relaxed text-justify">
                    Proteger os Agentes de Trânsito e garantir a conquista de direitos e o fortalecimento de suas competências e atribuições.
                </p>
            </div>
        </article>

        <!-- Visão -->
        <article class="flex gap-6 items-start">
            <div class="flex-shrink-0 p-3 rounded-full bg-gray-200 text-gray-900">
                <!-- Icone moderno -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M8 12l2 2 4-4"/>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">Visão</h2>
                <p class="text-gray-700 leading-relaxed text-justify">
                    Ser uma entidade independente na proteção dos direitos e garantias do Agente de Trânsito com presença constante nos espaços de discussão dos interesses dos Agentes de Trânsito e promover o fortalecimento da representatividade sindical.
                </p>
            </div>
        </article>

        <!-- Valores -->
        <article class="flex gap-6 items-start">
            <div class="flex-shrink-0 p-3 rounded-full bg-gray-200 text-gray-900">
                <!-- Icone moderno -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 17h16M4 7h16M4 12h16M4 17v-4M4 7v4"/>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-2">Valores</h2>
                <p class="text-gray-700 leading-relaxed text-justify">
                    Zelar pela qualidade na mobilização com transparência e independência na realização de ações e reinvindicações com participação efetiva da categoria.
                </p>
            </div>
        </article>
    </div>

    <!-- Definições Legais -->
    <section class="mt-14 bg-gray-50 rounded-xl p-8 shadow-inner">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-gray-900 pb-2">
            Definições Legais
        </h2>

        <article class="mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">AGENTE DA AUTORIDADE DE TRÂNSITO</h3>
            <p class="text-gray-700 leading-relaxed text-justify">
                Agente de trânsito e policial rodoviário federal que atuam na fiscalização, no controle e na operação de trânsito e no patrulhamento, competentes para a lavratura do auto de infração e para os procedimentos dele decorrentes, incluídos o policial militar ou os agentes referidos no art. 25-A deste Código, quando designados pela autoridade de trânsito com circunscrição sobre a via, mediante convênio, na forma prevista neste Código.
                <span class="block mt-2 italic text-sm text-gray-500">Redação dada pela Lei nº 14.229, de 2021</span>
            </p>
        </article>

        <article>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">AGENTE DE TRÂNSITO</h3>
            <p class="text-gray-700 leading-relaxed text-justify">
                Servidor civil efetivo de carreira do órgão ou entidade executivos de trânsito ou rodoviário, com as atribuições de educação, operação e fiscalização de trânsito e de transporte no exercício regular do poder de polícia de trânsito para promover a segurança viária nos termos da Constituição Federal.
                <span class="block mt-2 italic text-sm text-gray-500">Incluído pela Lei nº 14.229, de 2021</span>
            </p>
        </article>
    </section>

    <!-- PDF Viewer -->
    <section class="mt-16">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 border-b-2 border-gray-900 pb-2 text-center">
            Anexo: O Poder de Polícia do Agente de Trânsito na Legislação na Jurisprudência do STJ
        </h2>
        <iframe 
            src="{{ asset('pdfjs/web/viewer.html') }}?file={{ urlencode(asset('docs/ANEXO - O PODER DE POLÍCIA DO AGENTE DE TRÂNSITO NA LEGISLAÇÃO NA JURISPRUDÊNCIA DO STJ.pdf')) }}" 
            class="w-full h-[90vh] rounded-lg border border-gray-300 shadow-lg"
            frameborder="0" 
            aria-label="Visualizador de PDF do Anexo"
            >
        </iframe>
    </section>
</section>
@endsection
