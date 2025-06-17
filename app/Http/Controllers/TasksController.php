<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10', // ステータスのバリデーションを追加
        ]);

        // Task::create($validated); // create は新しいレコードを追加します

        $task  = new Task();                        // 空レコードを追加して
        $task->content = $validated['content'];     // content カラムに値をセット
        $task->status = $validated['status'];       // status カラムに値をセット、デフォルトは「未着手」
        $task->save();                              // save でデータベースに保存します

        return redirect()->route('tasks.index')->with('success', 'タスクを作成しました');
    }

    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10', // ステータスのバリデーションを追加
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'タスクを更新しました');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'タスクを削除しました');
    }
}
