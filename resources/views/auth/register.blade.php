
<x-guest-layout>
    <x-auth-banner />
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow floating-card">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-semibold mb-1">ユーザ名</label>
                <input id="name" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">メールアドレス</label>
                <input id="email" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block font-semibold mb-1">パスワード</label>
                <input id="password" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block font-semibold mb-1">パスワード（確認）</label>
                <input id="password_confirmation" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password_confirmation') border-red-500 @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">登録</button>
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-blue-700 hover:underline text-sm text-center">登録済みの方はこちら（ログイン）</a>
                @endif
            </div>
        </form>
    </div>
    <script>document.getElementById('name').focus();</script>
</x-guest-layout>
