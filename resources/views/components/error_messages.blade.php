@if ($errors->any())
    <div class="alert alert-danger mb-4"> {{-- alert-dangerはBootstrapの場合の例です。お使いのCSSに合わせてください。 --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif