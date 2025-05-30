@extends('app')

@section('title', ($book->exists ? 'Knihy - Editace knihy' : 'Knihy - Nová kniha'))

@section('content')
<form method="POST" action="{{ route('books.store', ['book' => $book]) }}">
    @csrf
    <div class="card mb-4">
        <div class="card-header">Základní informace</div>
        <div class="card-content p-3">
            <div class="mb-3">
                <label for="title" class="form-label">Název <span class="text-danger">*</span></label>
                <input required type="text" value="{{ old('title', $book->title) }}" name="title" @class(["form-control", "is-invalid" => $errors->has('title')]) id="title" placeholder="Titul...">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Autor <span class="text-danger">*</span></label>
                {{ $book->author_id }}
                <select name="author_id" id="author_id" class="form-select">
                    <option value="">-- Všichni autoři --</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" @selected(old('author_id', $book->author_id) == $author->id)>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN <span class="text-danger">*</span></label>
                <input required maxlength="13" type="text" value="{{ old('isbn', $book->isbn) }}" name="isbn" @class(["form-control", "is-invalid" => $errors->has('isbn')]) id="isbn" placeholder="ISBN">
                @error('isbn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover_url" class="form-label">Cover url: <span class="text-danger">*</span></label>
                <input required type="url" value="{{ old('cover_url', $book->cover_url) }}" name="cover_url" @class(["form-control", "is-invalid" => $errors->has('cover_url')]) id="cover_url" placeholder="https://...">
                @error('cover_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="published_at" class="form-label">Rok vydání (YYYY): <span class="text-danger">*</span></label>
                    <input type="text" pattern="\d*" maxlength="4" value="{{ old('published_at', $book->published_at) }}" name="published_at" @class(["form-control", "is-invalid" => $errors->has('published_at')]) id="published_at">
                    @error('published_at')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description <span class="text-danger">*</span></label>
                <textarea required name="description" @class(["form-control", "is-invalid" => $errors->has('description')]) id="description" rows="3">{{ old('description', $book->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">{{ $book->exists ? 'Uložit' : 'Vytvořit' }}</button>
        </div>
    </div>
</form>
@endsection