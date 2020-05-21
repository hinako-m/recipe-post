<ul class="nav nav-tabs nav-justified mb-3">
    <!--お気に入り一覧のリンク表示-->
    <li class="nav-item"><a href="{{ route('recipes.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('recipes/*/favorites') ? 'active' : '' }}">いいね <span class="badge badge-secondary">{{ $count_favorites }}</span></a></li>
</ul>