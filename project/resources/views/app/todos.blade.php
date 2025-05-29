@extends('app')

@section('title', 'Todo list')

@section('content')

<div class="row row-cols-1 row-cols-lg-3 row-cols-md-3 row-cols-sm-1 g-4">

    @include('app.todos.form')

    @each('components.todo-item-card', $todos, 'todo')

    @{{--
        @forelse ($todos as $todo)
            <x-todo-item-card :todo="$todo" />
        @empty
            <div class="alert alert-secondary">
                Nejsou tu žádná todo.
            </div>
        @endforelse
    --}}


</div>

@endsection
