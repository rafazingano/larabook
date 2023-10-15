@extends('layouts.app')

@section('content')
<div class="container mx-auto pt-20 pb-20">
    <div class="w-full max-w-screen-md">
    <div class="flex justify-between items-center rounded">
            <h1 class="text-2xl font-semibold">{{ $book->title?? 'livro' }}</h1>
            <div class="btn-group">
                <a href="{{ route('books.create') }}" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Novo Livro
                </a>
                <a href="{{ route('books.index') }}" class="bg-yellow-500 text-white hover:bg-yellow-700 px-4 py-2 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
        <div class="bg-white shadow-md rounded my-6">
            <div class="p-6">
                <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                <p><strong>Autor:</strong> {{ $book->author->name }}</p>
                <p><strong>Gênero:</strong> {{ $book->genre }}</p>
                <p><strong>Ano de Publicação:</strong> {{ $book->publication_year_formatted }}</p>
                <p><strong>Sinopse:</strong></p>
                <p>{{ $book->synopsis }}</p>
                <p><strong>Capa:</strong></p>
                @isset($book->cover)
                <img src="{{ $book->cover }}" alt="Capa do Livro" class="img-thumbnail">
                @endisset
            </div>
        </div>

        <h2>Dados do Autor</h2>
        <div class="bg-white shadow-md rounded my-6">
            <div class="p-6">
                <h3 class="text-lg font-semibold">{{ $book->author->name }}</h3>
                <p><strong>Data de Nascimento:</strong> {{ $book->author->birthdate_formatted }}</p>
                <p><strong>País:</strong> {{ $book->author->country }}</p>
                <p><strong>Biografia:</strong></p>
                <p>{{ $book->author->biography }}</p>
            </div>
        </div>
    </div>
</div>
@endsection