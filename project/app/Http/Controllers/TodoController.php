<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function __invoke()
    {
        echo "Az vyrostu budu todo list.";
    }

    public function list(): array {
        return [
            'todo-1' => [
                'id' => 1,
                'title' => 'Titulek',
            ],
            'todo-2' => [
                'id' => 2,
                'title' => 'Titulek 2',
            ]
        ];
    }

    public function store() {
        return new JsonResponse(['data']);
    }

    public function todo($id) {
        return "TodoController::todo($id)";
    }
}
