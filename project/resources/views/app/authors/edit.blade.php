@extends('app')

@section('title', ($author->exists ? 'Editace autora' : 'Autoři - Nový autor'))

@section('content')
<form method="POST" action="{{ route('authors.store', ['author' => $author]) }}">
    @csrf
    <div class="card mb-4">
        <div class="card-header">Základní informace</div>
        <div class="card-content p-3">
            <div class="mb-3">
                <label for="name" class="form-label">Jméno <span class="text-danger">*</span></label>
                <input required type="text" value="{{ old('name', $author->name) }}" name="name" @class(["form-control", "is-invalid" => $errors->has('name')]) id="name" placeholder="Jméno...">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="primary_genre" class="form-label">Hlavní žánr <span class="text-danger">*</span></label>
                <input required type="text" value="{{ old('primary_genre', $author->primary_genre) }}" name="primary_genre" @class(["form-control", "is-invalid" => $errors->has('primary_genre')]) id="primary_genre" placeholder="Poezie">
                @error('primary_genre')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo_url" class="form-label">Foto url: <span class="text-danger">*</span></label>
                <input required type="url" value="{{ old('photo_url', $author->photo_url) }}" name="photo_url" @class(["form-control", "is-invalid" => $errors->has('photo_url')]) id="photo_url" placeholder="https://...">
                @error('photo_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                    {{ $author->born_at }}
                    <label for="born_at" class="form-label">Datum narození (yyyy-mm-dd): <span class="text-danger">*</span></label>
                    <input required type="date" value="{{ old('born_at', $author->born_at?->format('Y-m-d')) }}" name="born_at" @class(["form-control", "is-invalid" => $errors->has('born_at')]) id="born_at">
                    @error('born_at')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="died_at" class="form-label">Datum úmrtí (yyyy-mm-dd): </label>
                    <input type="date" value="{{ old('died_at', $author->died_at?->format('Y-m-d')) }}" name="died_at" @class(["form-control", "is-invalid" => $errors->has('died_at')]) id="died_at">
                    @error('died_at')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">BIO <span class="text-danger">*</span></label>
                <textarea required name="bio" @class(["form-control", "is-invalid" => $errors->has('bio')]) id="bio" rows="3">{{ old('bio', $author->bio) }}</textarea>
                @error('bio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">{{ $author->exists ? 'Uložit' : 'Vytvořit' }}</button>
        </div>
    </div>
</form>
@endsection