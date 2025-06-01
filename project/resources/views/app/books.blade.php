@extends('app')

@section('title', 'Seznam knih')

@section('content')
    @include('app.books.filter')

    @role('BOOK_ADMIN')
    <div class="mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-outline-warning">Vytvořit knihu</a>
    </div>
    @endrole

    <div class="row">
        @forelse($books as $book)
            <x-book-item-card :book="$book" />
        @empty

        @endforelse
    </div>

    <div class="row mt-3">
        {{ $books->links() }}
    </div>
@endsection
