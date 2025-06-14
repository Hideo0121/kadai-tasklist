@extends('layouts.app')

@section('content')
    <h2 class="fw-bold text-primary mb-4">
        <i class="bi bi-clipboard-check-fill me-2"></i>タスク詳細
    </h2>

    <div class="card shadow-sm rounded mb-3">
        <div class="card-body">
            <p class="fs-5">{{ $task->content }}</p>
            <p class="text-muted small">
                作成日時：{{ $task->created_at->format('Y/m/d H:i') }}
            </p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary rounded-pill px-4 me-2">
        戻る
    </a>
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning rounded-pill px-4 shadow-sm me-2">
        <i class="bi bi-pencil-square me-1"></i> 編集
    </a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline" onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger rounded-pill px-4 shadow-sm">
            <i class="bi bi-trash me-1"></i> 削除
        </button>
    </form>
@endsection
