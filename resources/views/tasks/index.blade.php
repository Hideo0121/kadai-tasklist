@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>タスクリスト</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">＋ 新規タスク</a>
    </div>

    @if($tasks->isEmpty())
        <p>タスクがありません。</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->content }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-primary">詳細</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">編集</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
