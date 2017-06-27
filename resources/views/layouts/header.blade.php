<header>
    <div class="header-content container">
        <div class="header-brand">
            <h1>どんまるチャレンジ</h1>
        </div>
        <div class="header-right">
            <div class="user-name">
                {{ $user->name }}
            </div>
            <div class="login">
                <a href="/login/twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            </div>
            <div class="logout">
                <a href="/logout">ログアウト</a>
            </div>
        </div>
    </div>
</header>