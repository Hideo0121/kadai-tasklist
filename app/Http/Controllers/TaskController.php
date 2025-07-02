<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $perPage = in_array($perPage, [5, 10, 15]) ? $perPage : 10;
        $tasks = Task::where('user_id', Auth::id())->paginate($perPage)->appends(['per_page' => $perPage]);
        return view('tasks.index', compact('tasks', 'perPage'));
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
