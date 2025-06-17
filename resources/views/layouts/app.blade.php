<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    {{-- ナビゲーションバー --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('tasks.index') }}">Task Manager</a>
        </div>
    </nav>

    {{-- メインコンテンツのコンテナ --}}
    <div class="container">
        {{-- 成功メッセージ --}}
        @if(session('success'))
            <div class="alert alert-success mt-4">{{ session('success') }}</div>
        @endif

        {{-- エラーメッセージ --}}
        {{-- @include('components.error_messages')  --}}

        {{-- 各ページの内容がここに入る --}}
        @yield('content')
    </div>

    {{-- Bootstrap JS（必要であれば） --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>