<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::get();

        return view('app.authors', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->edit(new Author());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request, Author $author)
    {
        $isEdit = $author->exists;

        $author->fill($request->validated());
        $author->setUpdatedAt(now());
        $author->save();

        return redirect()->route('authors.index')
            ->with('success', $isEdit
                ? 'Autor byl upraven'
                : 'Autor byl vytvořen');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('app.authors.edit', compact('author'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
