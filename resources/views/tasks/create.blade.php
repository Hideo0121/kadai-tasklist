@extends('layouts.app')

@section('content')
    <h2>新規タスク作成</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="content" class="form-label">タスク内容</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror"
                   id="content" name="content" value="{{ old('content') }}" required>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">作成</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">戻る</a>
    </form>
@endsection
