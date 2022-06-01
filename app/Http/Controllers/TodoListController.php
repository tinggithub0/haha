<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $todos = TodoList::
                where('finish', '=', 'N')
                ->where('user_id', '=', auth()->id())
                ->get();
        return view('users.todolist', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'deadline' => 'date_format:Y-m-d'
        ]);

        TodoList::create([
            'user_id' => auth()->id(),
            'body' => $request->body,
            'deadline' => $request->deadline,
        ]);

        return back();
    }

    public function finish(TodoList $id)
    {
        $id->update([
            'finish' => 'Y'
        ]);

        return back();
    }

    public function delete($id)
    {
        TodoList::destroy($id);
        return back();
    }
}
