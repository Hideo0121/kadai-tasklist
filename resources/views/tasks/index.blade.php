@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-clipboard-check-fill me-2"></i>タスクリスト
        </h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-outline-success shadow-sm rounded-pill">
            <i class="bi bi-plus-circle me-1"></i>新規タスク
        </a>
    </div>

    <div class="text-muted mb-3 small">
        現在 {{ $tasks->count() }} 件のタスクがあります 📝
    </div>

    @if($tasks->isEmpty())
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-circle me-2"></i>まだタスクが登録されていません！
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center bg-white shadow-sm rounded">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 70%">📌 内容</th>
                        <th style="width: 15%">⏰ 状態</th>
                        <th style="width: 15%">🔧 操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="text-start">{{ \Illuminate\Support\Str::limit($task->content, 50) }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline"  onsubmit="return confirm('本当に削除しますか？');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
