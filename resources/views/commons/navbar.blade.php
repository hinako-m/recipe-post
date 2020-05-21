<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #75A9FF;"> 
        <a class="navbar-brand" href="/">Recipe-post</a>
            <ul class = navbar-nav mr-auto>
        @if (Auth::check())
                <li class="nav-item">ユーザー機能</li>
                <li class="nav-item">{!! link_to_route('recipes.index', 'レシピ一覧', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item"><a href="#" class="nav-link">おきにいりレシピ</a></li>

            <li class="nav-item">{!! link_to_route('recipes.create', 'レシピを書く', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
            @else
                <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                <button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span>検索</button>
            @endif
            </ul>
        </div>
    </nav>
</header>