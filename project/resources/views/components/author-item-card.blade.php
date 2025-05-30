<div>
    <div class="card mb-3">
        <div class="row g-1">
            <div class="col-md-4">
                <img src="{{ $author->photo_url  }}" class="img-fluid rounded-start" alt="{{ $author->name }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $author->name }}</h5>
                    <p class="card-subtitle mb-2 text-muted">
                        Narození: {{ $author->born_at->format('d.m.Y') }}@if ($author->died_at), Úmrtí: {{ $author->died_at->format('d.m.Y') }} @endif, Věk: {{ $author->age() }}
                    </p>
                    <p class="card-text">
                        <span class="badge text-bg-primary">{{ mb_ucfirst($author->primary_genre) }}</span>
                    </p>
                    <p class="card-text text-muted">
                        @if ($author->books->isEmpty())
                            Zatím žádné knihy
                        @else
                            Knih v databázi: <a href="{{ route('books.index', ['author_id' => $author->id]) }}">{{ $author->books->count() }}</a>
                        @endif
                    </p>
                    <p class="card-text">{{ $author->bio  }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">Upraveno: {{ $author->updated_at->diffForHumans() }} 
            @role('AUTHOR_ADMIN')
            <a href="{{ route('authors.edit', ['author' => $author]) }}" class="btn btn-sm btn-outline-danger">Upravit</a>
            @endrole
        </div>
    </div>
</div>