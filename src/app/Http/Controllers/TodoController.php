<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    public function index()
    {
        $todoList = $this->todo->all();

        return view('todo.index', ['todoList' => $todoList]);
    }

    public function create()
    {
        return view('todo.create'); 
    }

    public function store(Request $request)
    {
        $inputs = $request->all(); 

        $this->todo->fill($inputs);
        $this->todo->save(); 
        
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function edit($id)
{
    // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
    $todo = $this->todo->find($id);
    return view('todo.edit', ['todo' => $todo]);
}



}

