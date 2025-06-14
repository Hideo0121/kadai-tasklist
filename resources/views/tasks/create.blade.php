@extends('layouts.app')

@section('content')
    <h2 class="fw-bold text-success mb-4">
        <i class="bi bi-plus-circle-fill me-2"></i>新規タスク作成
    </h2>

    <form action="{{ route('tasks.store') }}" method="POST" class="mb-3">
        @csrf

        <div class="mb-3">
            <label for="content" class="form-label fw-semibold">タスク内容</label>
            <input type="text"
                class="form-control rounded-pill @error('content') is-invalid @enderror"
                id="content"
                name="content"
                value="{{ old('content') }}"
                placeholder="例）買い物に行く"
                required>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
            <i class="bi bi-check-lg me-1"></i> 作成
        </button>
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary rounded-pill ms-2 px-4">
            戻る
        </a>
    </form>
@endsection
