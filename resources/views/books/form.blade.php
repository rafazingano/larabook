<div class="block">
    <label for="title" class="text-sm font-medium text-gray-700">Título</label>
    <input type="text" name="title" class="form-input mt-1 block w-full" value="{{ $book->title?? NULL }}" required>
</div>
<div class="block">
    <label for="author_id" class="text-sm font-medium text-gray-700">Autor</label>
    <select name="author_id" class="form-input mt-1 block w-full" required>
        @foreach($authors as $author)
        <option value="{{ $author->id }}" {{ isset($book) && $book->author_id == $author->id ? 'selected' : '' }}>
            {{ $author->first_name }} {{ $author->last_name }}
        </option>
        @endforeach
    </select>
</div>
<div class="block">
    <label for="genre" class="text-sm font-medium text-gray-700">Gênero</label>
    <input type="text" name="genre" class="form-input mt-1 block w-full" value="{{ $book->genre?? NULL }}" required>
</div>
<div class="block">
    <label for="synopsis" class="text-sm font-medium text-gray-700">Sinopse</label>
    <textarea name="synopsis" class="form-textarea mt-1 block w-full" rows="5" required>{{ $book->synopsis?? NULL }}</textarea>
</div>
<div class="block">
    <label for="publication_year" class="text-sm font-medium text-gray-700">Ano de Publicação</label>
    <input type="date" name="publication_year" class="form-input mt-1 block w-full" value="{{ $book->publication_year?? NULL }}" required>
</div>
<div class="block">
    <label for="cover" class="text-sm font-medium text-gray-700">Capa</label>
    <input type="file" name="cover" class="form-input mt-1 block w-full">
    @isset($book->cover)
    <img src="{{ $book->cover }}" />
    @endisset
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Salvar
    </button>
</div>