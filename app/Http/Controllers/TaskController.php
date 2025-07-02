<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);
        $validated['user_id'] = Auth::id();
        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'タスクを追加しました');
    }

    public function edit($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);
        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'タスクを更新しました');
    }

    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())->findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'タスクを削除しました');
    }
}
