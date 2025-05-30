<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Models\Todo;

class TodoController extends Controller {

    public function index() {
        // $todos = Todo::get();
        $todos = Todo::paginate(5);

        return TodoResource::collection($todos);
    }

    public function show(Todo $todo) {
        // return $todo;
        return new TodoResource($todo);
    }

}

