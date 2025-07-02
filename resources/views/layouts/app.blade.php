<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>タスクリスト</title>

        <link rel="icon" type="image/jpeg" href="/images/logo.jpg">
        <!-- Fonts: BIZ UD ゴシック -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="font-family: 'BIZ UD Gothic', 'BIZ UDGothic', sans-serif; background: #e3f0ff;">
        <div class="min-h-screen bg-blue-50">


            <!-- シンプルバナー（index.blade.phpのみポップデザインに差し替え） -->
            @if (request()->routeIs('tasks.index'))
            <div class="w-full flex items-center justify-center bg-gradient-to-r from-blue-400 via-pink-300 to-yellow-200 py-4 px-6 shadow relative">
                <img src="/images/logo.jpg" alt="ロゴ" class="h-12 w-12 mr-4 drop-shadow-lg animate-bounce">
                <span class="text-3xl font-extrabold tracking-widest text-white drop-shadow pop-title" style="letter-spacing:0.15em; text-shadow: 2px 2px 8px #2563eb, 0 0 8px #fff;">
                    タスクリスト
                </span>
                <span class="text-blue-900 font-bold ml-auto mr-4 text-lg flex items-center">
                    <svg xmlns='http://www.w3.org/2000/svg' class='inline h-6 w-6 mr-1 text-blue-700' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7' /></svg>
                    {{ Auth::user()->name ?? '' }}
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-pink-500 hover:bg-pink-400 text-white px-4 py-2 rounded font-bold shadow transition">ログアウト</button>
                </form>
            </div>
            @else
            <div class="w-full flex items-center bg-blue-600 py-3 px-6 shadow">
                <span class="text-white text-2xl font-bold tracking-wide">タスクリスト</span>
                <span class="text-white font-semibold ml-auto mr-4">{{ Auth::user()->name ?? '' }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded">ログアウト</button>
                </form>
            </div>
            @endif

            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
