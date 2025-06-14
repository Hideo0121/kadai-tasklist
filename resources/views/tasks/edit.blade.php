@extends('layouts.app')

@section('content')
    <h2>タスク編集</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="content" class="form-label">タスク内容</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror"
                   id="content" name="content" value="{{ old('content', $task->content) }}" required>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">戻る</a>
    </form>
@endsection
