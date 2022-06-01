<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'delete']);
    }

    public function index()
    {

        $mess = Message::getMessages();
        $users = User::select('id', 'username')->get();

        return view('messages.index', [
            'mess' => $mess,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'body' => 'required'
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'toUser' => $request->select,
            'title' => $request->title,
            'body' => $request->body,
            'deadline' => $request->deadline,
        ]);

        return back();
    }

    public function finish(Message $id)
    {
        $id->update([
            'finisher' => auth()->id()
        ]);

        return back();
    }

    public function delete($id)
    {
        //加policy
        Message::destroy($id);
        return back();
    }

    public function show($id)
    {
        $mes = Message::getMessages($id);
        return view('messages.show', [
            'mes' => $mes
        ]);
    }
}
