<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Author;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookService $bookService)
    {
        $authors = Author::with('books')->orderBy('name')->get();
        $books = $bookService->getSearchBuilder(
            request('search'),
            request('author_id')
        )->paginate(10)->withQueryString();

        Paginator::useBootstrap();

        return view('app.books', compact('books', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->edit(new Book());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request, Book $book)
    {
        $isEdit = $book->exists;

        $book->fill($request->validated());
        $book->setUpdatedAt(now());
        $book->save();

        return redirect()->route('books.index')
            ->with('success', $isEdit
                ? 'Kniha byla upravena'
                : 'Kniha byla vytvořena');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::get();

        return view('app.books.edit', compact("book", "authors"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
