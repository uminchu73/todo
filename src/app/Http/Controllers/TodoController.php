<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;


class TodoController extends Controller
{
    //一覧表示
    public function index()
    {
        $todos = Todo::all();

        return view('index', compact('todos'));
    }

    //新規作成
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);

        return redirect('/')->with('message', 'Todoを作成しました');
    }

    //更新処理
    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message', 'Todoを更新しました');
    }

    //削除処理
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();

        return redirect('/')->with('message', 'Todoを削除しました');
    }
}
