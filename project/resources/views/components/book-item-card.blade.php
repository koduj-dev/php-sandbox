<div>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-xl-1 col-sm-3 col-md-3">
                <img src="{{ $book->cover_url }}" alt="{{ $book->title }}" title="{{ $book->title }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-9 col-xl-11 col-sm-9">
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex">
                        <h5 class="col-md-10 font-weight-bold">{{ $book->title }}</h5>
                        <div class="col-md-2 d-flex justify-content-end align-items-end">
                            <a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-outline-success me-md-2" type="button">Upravit</a>
                        </div>
                    </div>
 
                    <div class="card-title"><a href="{{ route('authors.edit', ['author' => $book->author]) }}">{{ $book->author->name }}</a>, {{ $book->published_at }}</div>
                    <div class="card-text text-muted mt-2 mb-2">ISBN: {{ $book->isbn }}</div>
                    <div class="card-text">{{ $book->description }}</div>
                </div>
            </div>
        </div>
    </div>
</div>