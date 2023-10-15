@extends('layouts.app')

@section('content')
<div class="container mx-auto pt-20 pb-20">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="flex justify-between items-center rounded my-6">
                <h1 class="text-2xl font-semibold">Pesquisa de Livros</h1>
                <a href="{{ route('books.create') }}" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Novo Livro
                </a>
            </div>
            <div class="bg-white shadow-md rounded my-6">
                @include('books.table')
            </div>
        </div>
    </div>
</div>
@endsection
