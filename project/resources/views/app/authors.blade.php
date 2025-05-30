@extends('app')

@section('title', 'Autoři')

@section('content')
    @role('AUTHOR_ADMIN')
    <div class="btn mb-2">
        <a href="{{ route('authors.create') }}" class="btn btn-outline-warning">Přidat autora</a>
    </div>
    @endrole

    <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2 
                row-cols-sm-1 g-4">
        @foreach ($authors as $author)
            <x-author-item-card :author="$author" />
        @endforeach
    </div>
@endsection