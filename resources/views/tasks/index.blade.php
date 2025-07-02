@extends('layouts.app')

@section('content')

    <div class="flex justify-end items-center mt-8 mb-4 w-3/4 max-w-4xl mx-auto">
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">新規作成</a>
    </div>

    <div class="mb-3 text-blue-900 font-semibold w-3/4 max-w-4xl mx-auto">
        　現在 {{ $tasks->count() }} 件のタスクがあります 📝
    </div>

    @if($tasks->isEmpty())
        <div class="text-center text-blue-600 bg-blue-100 p-4 rounded shadow w-3/4 max-w-4xl mx-auto floating-card">
            まだタスクが登録されていません！
        </div>
    @else
        <div class="overflow-x-auto w-3/4 max-w-4xl mx-auto floating-card">
            <table class="min-w-full bg-white rounded shadow">
                <colgroup>
                    <col style="width:54%">
                    <col style="width:26%">
                    <col style="width:20%">
                </colgroup>
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2 px-6">内容</th>
                        <th class="py-2 px-6">状態</th>
                        <th class="py-2 px-4 w-40">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b">
                            <td class="py-2 px-6 text-left">{{ \Illuminate\Support\Str::limit($task->content, 50) }}</td>
                            <td class="py-2 px-6">{{ $task->status }}</td>
                            <td class="py-2 px-4 w-40 flex gap-2 justify-center">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-sm">修正</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('削除します。よろしいですか。');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
