@extends('app')

@section('title', 'Autoři')

@section('content')
    @role('AUTHOR_ADMIN')
    <div class="btn mb-2">
        <a href="{{ route('authors.create') }}" class="btn btn-outline-warning">Přidat autora</a>
    </div>
    @endrole

    <div class="btn-group mb-2" role="toolbar">
        <a href="{{ route('authors.index') }}" class="btn btn-success {{ !request('genre') ? 'active' : '' }}">Vše</a>
        @foreach($genres as $genre)
            <a href="{{ route('authors.index', ['genre' => $genre]) }}" class="btn btn-primary {{ request('genre') === $genre ? 'active' : '' }}">{{ mb_ucfirst($genre) }}</a>
        @endforeach
    </div>

    <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2
                row-cols-sm-1 g-4">
        @foreach ($authors as $author)
            <x-author-item-card :author="$author" />
        @endforeach
    </div>
@endsection
