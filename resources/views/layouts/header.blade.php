<header>
    <div class="header-content container">
        <div class="page-header">
            <h1>どんまるチャレンジ</h1>
        </div>

        @if ($user)
            <ul class="nav nav-tabs">
                {{-- ショップのidが決め打ちなのであとで修正する --}}
                <li role="presentation">
                    <a href="/user/{{ $user->id }}/shop/1/don">自分の記録</a>
                </li>
                <li role="presentation">
                    <a href="{{ route('don.create') }}">記録する</a>
                </li>
            </ul>
        @else
            <a href="/login/twitter">Twitterでログインする</a>
        @endif
    </div>
</header>