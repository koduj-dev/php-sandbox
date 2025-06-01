<div class="row mb-4 g-0 pb-3 pt-2 border border-secondary rounded">
    <form method="GET" class="row align-items-end">
        <div class="col-md-6">
            <label for="search" class="form-label">Hledat</label>
            <input
                type="text"
                name="search"
                id="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Název nebo popis knihy"
            >
        </div>

        <div class="col-md-4">
            <label for="author_id" class="form-label">Autor</label>
            <select name="author_id" id="author_id" class="form-select">
                <option value="">-- Všichni autoři --</option>
                @foreach ($authors as $author)
                    @php
                        $count = $author->books->count()
                    @endphp
                    <option value="{{ $author->id }}" @selected(request('author_id') == $author->id) @disabled($count == 0)>
                        {{ $author->name }} ({{ $count }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrovat</button>
        </div>
    </form>
</div>
