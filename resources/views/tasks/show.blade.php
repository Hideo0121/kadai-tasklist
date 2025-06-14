@extends('layouts.app')

@section('content')
    <h2>タスク詳細</h2>

    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">{{ $task->content }}</p>
            <p class="text-muted">作成日時: {{ $task->created_at->format('Y/m/d H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">戻る</a>
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">編集</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline"
          onsubmit="return confirm('本当に削除しますか？');">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">削除</button>
    </form>
@endsection
