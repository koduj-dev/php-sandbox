<?php

namespace App\Http\Controllers\Api;

use App\Enums\TodoFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller {

    use AuthorizesRequests;

    public function index(?string $filter = null) {
        $filter = TodoFilter::tryFrom($filter);
        // $todos = Todo::get();

        $todoQuery = Todo::query()->where('user_id', request()->user()->id);

        match ($filter) {
            TodoFilter::Uncompleted => $todoQuery->whereNotNull('completed_at'),
            TodoFilter::Completed => $todoQuery->whereNull('completed_at'),
            default => null,
        };

        if ($filter !== TodoFilter::All) {
            $todos = $todoQuery->paginate(5);
        } else {
            $todos = $todoQuery->get();
        }

        // return $todos;
        return TodoResource::collection($todos);
    }

    public function show(Todo $todo) {
        $this->authorize('view', $todo);

        // return $todo;
        return new TodoResource($todo);
    }

    public function create(StoreTodoRequest $request) {
        return $this->update($request, Todo::make(['user_id' => $request->user()->id]));
    }

    public function update(StoreTodoRequest $request, Todo $todo) {
        $todo->fill($request->validated());
        $todo->updated_at = now();
        $todo->save();

        return new TodoResource($todo);
    }

    public function delete(Todo $todo) {
        $todo->delete();

        return response()->noContent();
    }
}

