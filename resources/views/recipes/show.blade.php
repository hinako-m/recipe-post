@extends('layouts.app')

@section('content')
<!--showはレシピ詳細ページ-->
<!--indexやfavoriteでレシピをクリックしたときに見える-->
<h1></h1>
<!--ログインした人だけ＆自分のレシピだけ編集できる-->
<!-- {!! link_to_route('recipes.edit', 'レシピを編集', ['id' => $recipe->id], ['class' => 'btn btn-light']) !!}-->
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $recipe->id }}</td>
        </tr>
        <tr>
            <th>レシピタイトル</th>
            <td>{{ $recipe->title }}</td>
        </tr>
        <tr>
            <th>調理時間</th>
            <td>{{ $recipe->cooking_time }}</td>
        </tr>
        <tr>
            <th>調理器具</th>
            <td>{{ $recipe->cookware }}</td>
        </tr>
        <tr>
            <th>材料（1人分）</th>
            <td>{{ $recipe->material }}</td>
        </tr>
        <tr>
            <th>量</th>
            <td>{{ $recipe->amount }}</td>
        </tr>
        <tr>
            <th>レシピメモ</th>
            <td>{{ $recipe->memo }}</td>
        </tr>
    </table>
 <!--ログイン後のレシピ詳細に編集、削除ボタン-->
    @if (\Auth::id() == $recipe->user_id) 
        {!! link_to_route('recipes.edit', 'レシピを編集', ['id' => $recipe->id], ['class' => 'btn btn-light']) !!}
    
    <div class="row">
    <aside class="col-sm-4">
            @include('recipes.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('recipes.navtabs', ['user' => $user])
            
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'recipes.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
    @endif
    <!--お気に入りボタンの設置-->
    @if (count($recipes) > 0)
        @include('recipes.index', ['recipes' => $recipes])
    @endif
    </div>
    </div>
@endsection