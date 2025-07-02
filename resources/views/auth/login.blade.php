
<x-guest-layout>
    <x-auth-banner />
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow floating-card">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">メールアドレス</label>
                <input id="email" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block font-semibold mb-1">パスワード</label>
                <input id="password" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <label for="remember_me" class="ms-2 text-sm text-gray-600">ログイン状態を保持する</label>
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">ログイン</button>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-blue-700 hover:underline text-sm text-center">未登録の方はこちら（新規登録）</a>
                @endif
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-blue-700 hover:underline text-sm text-center">パスワードを忘れた方はこちら</a>
                @endif
            </div>
        </form>
    </div>
    <script>document.getElementById('email').focus();</script>
</x-guest-layout>
