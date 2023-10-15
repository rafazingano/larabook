@extends('layouts.app')

@section('content')
<div class="container mx-auto pt-20 pb-20">
    <div class="w-full max-w-screen-md">
        <div class="flex justify-between items-center rounded my-6">
            <h1 class="text-2xl font-semibold">Novo autor</h1>
            <a href="{{ route('authors.index') }}" class="bg-yellow-500 text-white hover:bg-yellow-700 px-4 py-2 rounded inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                </svg>
                Voltar
            </a>
        </div>
        <div class="bg-white shadow-md rounded my-6">
            <form action="{{ route('authors.store') }}" method="POST" class="p-6">
                @csrf
                @include('authors.form')
            </form>
        </div>
    </div>
</div>
@endsection