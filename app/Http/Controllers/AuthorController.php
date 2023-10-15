<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::paginate();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorStoreRequest $request)
    {
        $author = Author::create($request->all());

        return redirect()->route('authors.edit', $author)->with('success', 'Autor criado com sucesso.');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $author->update($request->all());

        return redirect()->route('authors.edit', $author)->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Autor excluído com sucesso.');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }
}
