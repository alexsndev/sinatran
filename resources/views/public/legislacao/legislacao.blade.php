@extends('layouts.public')

@section('title', 'Legislação')

@section('content')
    <section class="max-w-7xl mx-auto p-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Lei 2990 de 2002</h1>

        <iframe src="{{ asset('docs/lei-2990-2002.pdf') }}" class="w-full h-[100vh]" frameborder="0"></iframe>
    </section>
@endsection
