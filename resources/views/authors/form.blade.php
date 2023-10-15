<div class="grid grid-cols-1 gap-6">
    <div class="block">
        <label for="first_name" class="text-sm font-medium text-gray-700">Nome</label>
        <input type="text" name="first_name" class="form-input mt-1 block w-full" value="{{ $author->first_name?? NULL }}" required>
    </div>
    <div class="block">
        <label for="last_name" class="text-sm font-medium text-gray-700">Sobrenome</label>
        <input type="text" name="last_name" class="form-input mt-1 block w-full" value="{{ $author->last_name?? NULL }}"  required>
    </div>
    <div class="block">
        <label for="birthdate" class="text-sm font-medium text-gray-700">Data de Nascimento</label>
        <input type="date" name="birthdate" class="form-input mt-1 block w-full" value="{{ $author->birthdate?? NULL }}"  required>
    </div>
    <div class="block">
        <label for="country" class="text-sm font-medium text-gray-700">País</label>
        <input type="text" name="country" class="form-input mt-1 block w-full" value="{{ $author->country?? NULL }}"  required>
    </div>
    <div class="block">
        <label for="biography" class="text-sm font-medium text-gray-700">Biografia</label>
        <textarea name="biography" class="form-textarea mt-1 block w-full" rows="5" required> {{ $author->biography?? NULL }} </textarea>
    </div>
</div>
<div class="mt-6">
    <button type="submit" class="bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Salvar
    </button>
</div>