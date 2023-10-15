@extends('layouts.app')

@section('content')
<div class="container mx-auto pt-20 pb-20">
    <div class="w-full max-w-screen-md">
    <div class="flex justify-between items-center rounded">
            <h1 class="text-2xl font-semibold">Editar {{ $author->name?? 'livro' }}</h1>
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
            <form action="{{ route('books.update', $book) }}" method="POST" class="p-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('books.form')
            </form>
        </div>
    </div>
</div>
@endsection