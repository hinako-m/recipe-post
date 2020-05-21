<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light bg-light"> 
        <a class="navbar-brand" href="/">レシピ紹介サイト</br>らくうまレシピ</a>
        
        @if (Auth::check())
        <li class="nav-item"><a href="#" class="nav-link">ユーザー機能</a></li>
                <li class="nav-item"><a href="#" class="nav-link">レシピ一覧</a></a></li>
                <li class="nav-item"><a href="#" class="nav-link">おきにいりレシピ</a></li>
                <li class="nav-item"><a href="#" class="nav-link">つくったレシピ</a></li>
                <li class="nav-item">{!! link_to_route('recipes.create', 'レシピを書く', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
            @else
                <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span>検索</button>
            @endif
            </ul>
        </div>
    </nav>
</header>