<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::paginate();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(BookStoreRequest $request)
    {
        $book = Book::create($request->all());

        $this->uploadCover($request, $book);

        return redirect()->route('books.index')->with('success', 'Livro criado com sucesso.');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookUpdateRequest $request, Book $book)
    {
        $book->update($request->all());

        $this->uploadCover($request, $book);

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $books = Book::where('title', 'like', "%$search%")
            ->orWhereHas('author', function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
            })
            ->paginate();

        $books->appends(['search' => $search]);

        return view('books.search', compact('books', 'search'));
    }

    public function uploadCover(Request $request, Book $book)
    {
        if ($request->hasFile('cover')) {
            $book->cover = $request->file('cover')->store('covers', 'public');
            $book->save();
        }
    }
}
