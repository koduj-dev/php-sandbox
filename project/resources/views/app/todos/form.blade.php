<form method="POST" action="{{ route('todos.store') }}">
    @csrf

    <div class="card mb-4">
        <div class="card-header">Přidat todo:</div>
        <div class="card-content p-3">
            <div class="mb-3">
                <label for="title" class="form-label">Název <span class="text-danger">*</span></label>
                <input required type="text" value="{{ old('title') }}" name="title"
                       @class(['form-control', 'is-invalid' => $errors->has('title')])
                       id="title"
                       placeholder="Namalovat obrázek">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Popis <span class="text-danger">*</span></label>
                <textarea required name="content" 
                    class="form-control" id="content" rows="3">{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">Vytvořit</button>
        </div>
    </div>
</form>