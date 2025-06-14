@extends('layouts.app')

@section('content')
    <h2 class="fw-bold text-warning mb-4">
        <i class="bi bi-pencil-square me-2"></i>タスク編集
    </h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="content" class="form-label fw-semibold">タスク内容</label>
            <input type="text"
                class="form-control rounded-pill @error('content') is-invalid @enderror"
                id="content"
                name="content"
                value="{{ old('content', $task->content) }}"
                required>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm">
            <i class="bi bi-check-lg me-1"></i> 更新
        </button>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary rounded-pill ms-2 px-4">
            戻る
        </a>
    </form>
@endsection
