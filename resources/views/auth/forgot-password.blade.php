
<x-guest-layout>
    <x-auth-banner />
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow floating-card">
        <div class="mb-4 text-sm text-gray-600">
            パスワードをお忘れですか？ご登録のメールアドレスを入力してください。パスワード再設定用のリンクをお送りします。
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">メールアドレス</label>
                <input id="email" class="w-full border border-blue-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2 mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">再設定リンクを送信</button>
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-blue-700 hover:underline text-sm text-center">ログインページへ戻る</a>
                @endif
            </div>
        </form>
    </div>
    <script>document.getElementById('email').focus();</script>
</x-guest-layout>
