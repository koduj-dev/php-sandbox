<div class="col">
    <div class="card">
        <div class="card-header">
            @if ($todo->completed_at)
                <span class="badge text-bg-success">Hotovo</span>
            @else 
                <span class="text-danger">⨯</span>
            @endif
            {{ $todo->title }}
        </div>
        <div class="card-body">
            <p class="card-subtitle mb-3 text-muted">
                Vytvořeno: {{ $todo->created_at->diffForHumans() }} 
                @isset($todo->completed_at)
                    , Dokončeno {{ $todo->completed_at->diffForHumans() }}
                @endisset
                , ID: {{ $todo->id }}
            </p>
            <p class="card-text">
                {{ $todo->content }}
            </p>
        </div>
        <div class="card-footer">
            @empty($todo->completed_at)
                <a href="{{ route('todos.complete', $todo) }}" class="btn btn-sm btn-success">Dokončit</a>
            @endempty

            <a href="{{ route('todos.delete', $todo) }}" class="btn btn-sm btn-danger">Smazat</a>
        </div>
    </div>
</div>