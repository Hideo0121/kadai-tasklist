@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded shadow floating-card">
        <h2 class="text-xl font-bold text-blue-700 mb-6 flex items-center">
            <img src="/images/logo.jpg" alt="ロゴ" class="h-7 w-7 mr-2">新規タスク作成
        </h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="content" class="block font-semibold mb-1">タスク内容</label>
                <input type="text" id="content" name="content" value="{{ old('content') }}" placeholder="例）買い物に行く" inputmode="kana" lang="ja" autocomplete="on"
                    class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('content') border-red-500 @enderror" autofocus>
                @error('content')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block font-semibold mb-1">状況</label>
                <input type="text" id="status" name="status" value="{{ old('status') }}" placeholder="例）未着手" inputmode="kana" lang="ja" autocomplete="on"
                    class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('status') border-red-500 @enderror">
                @error('status')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end gap-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">作成</button>
                <a href="{{ route('tasks.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded shadow">戻る</a>
            </div>
        </form>
    </div>
    <script>document.getElementById('content').focus();</script>
@endsection
