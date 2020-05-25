<div class="btn-toolbar">
    <div class="btn-group">
    @if (Auth::user()->add_favorite($recipe->id))
    <!--favorites.favoriteはルーティング名-->
        {!! Form::open(['route' => ['favorites.unfavorite', $recipe->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいね解除', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $recipe->id]]) !!}
            {!! Form::submit('いいね', ['class' => "btn btn-info btn-block"]) !!}
        {!! Form::close() !!}
    @endif
    </div>
</div>