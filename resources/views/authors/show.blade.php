@extends('layouts.app')

@section('content')
<div class="container mx-auto pt-20 pb-20">
    <div class="w-full max-w-screen-md">
        <div class="flex justify-between items-center rounded">
            <h1 class="text-2xl font-semibold">{{ $author->name?? 'autor' }}</h1>
            <div class="btn-group">
                <a href="{{ route('authors.create') }}" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Novo Autor
                </a>
                <a href="{{ route('authors.index') }}" class="bg-yellow-500 text-white hover:bg-yellow-700 px-4 py-2 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                    Voltar
                </a>
            </div>
        </div>
        <div class="bg-white shadow-md rounded my-6">
            <div class="p-6">
                <h3 class="text-lg font-semibold">{{ $author->first_name }} {{ $author->last_name }}</h3>
                <p><strong>Data de Nascimento:</strong> {{ $author->birthdate }}</p>
                <p><strong>País:</strong> {{ $author->country }}</p>
                <p><strong>Biografia:</strong></p>
                <p>{{ $author->biography }}</p>
            </div>
        </div>

        <h2>Livros do Autor</h2>
        @if (count($author->books) > 0)
        <div class="bg-white shadow-md rounded my-6">
            <ul class="min-w-full">
                @foreach ($author->books as $book)
                <li class="px-6 py-4 flex items-center justify-between odd:bg-gray-50 even:bg-white">
                    {{ $book->title }} ({{ $book->publication_year }})
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm float-right">
                        Detalhes
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @else
        <p class="my-6">O autor não tem livros listados.</p>
        @endif
    </div>
</div>
@endsection