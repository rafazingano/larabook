@extends('layouts.app')

@section('content')

<div class="container mx-auto pt-20 pb-20">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="flex justify-between items-center rounded my-6">
                <h1 class="text-2xl font-semibold">Lista de Autores</h1>
                <a href="{{ route('authors.create') }}" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Novo Autor
                </a>
            </div>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data de Nascimento</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">País</th>
                            <th class="px-1 py-3 text-xs font-medium text-gray-500 uppercase"></th>
                            <th class="px-1 py-3 text-xs font-medium text-gray-500 uppercase"></th>
                            <th class="px-1 py-3 text-xs font-medium text-gray-500 uppercase"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                        <tr class="odd:bg-gray-50 even:bg-white">
                            <td class="px-6 py-4">{{ $author->name }}</td>
                            <td class="px-6 py-4">{{ $author->birthdate_formatted }}</td>
                            <td class="px-6 py-4">{{ $author->country }}</td>
                            <td class="px-1 py-4">
                                <a href="{{ route('authors.show', $author) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-1 py-4">
                                <a href="{{ route('authors.edit', $author) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-1 py-4">
                                <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este autor?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-6">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection