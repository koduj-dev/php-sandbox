<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function __invoke()
    {
        $todos = Todo::orderByDesc('id')->get();

        return view('app.todos', compact('todos'));
    }

    public function store(StoreTodoRequest $request) {
        $todo = Todo::make($request->validated());
        $todo->user_id = User::inRandomOrder()->first()->id;
        $todo->save();

        return redirect()->back()->with('success', 'Úkol byl vytvořen');
    }

    public function complete(Todo $todo) {
        $todo->completed_at = now();
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'ok');
    }

    public function delete(Todo $todo) {
        $todo->delete();

        return redirect()->route('todos.index');
    }









    
    public function byUser(User $user) {
        $todos = Todo::with('user')->whereBelongsTo($user)->get();
        
        return $this->list($todos);
    }

    public function list($todos = null) {
        if (!$todos) {
            $todos = Todo::with(['user'])->paginate(10);
        }

        $response = "<table style=\"width: 100%\">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Název TODO</th>
                    <th>Autor</th>
                </tr>
            </thead>
        ";

        foreach ($todos as $todo) {
            $response .= "
                <tr>
                    <td>$todo->id</td>
                    <td>$todo->title</td>
                    <td>{$todo->user->name}</td>
                </tr>
            ";
        }

        $response .= "</table>";

        return $response;
    }

    public function todo(Todo $todo) {
        dump($todo->id);
        dump($todo->title);
        dump($todo->user->name);
        dump($todo->user->email);

        foreach ($todo->user->todos as $userTodo) {
            dump($todo->id . " | " .$userTodo->title);
        }

        dd($todo);
//        return "TodoController::todo($id)";
    }
}
