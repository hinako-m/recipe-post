@extends('layouts.app')

@section('content')
<!--お気に入り一覧のViewページ-->
<h1>おきにいりレシピ一覧</h1>

    @if (count($recipes) > 0)
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>調理時間</th>
                    <th>調理器具</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $recipe)
                <tr>
                    <td>{!! link_to_route('recipes.show', $recipe->title, ['id' => $recipe->id]) !!}</td>
                    <td>{{ $recipe->cooking_time }}</td>
                    <td>{{ $recipe->cookware }}</td>
                    <td>
                    @if (Auth::id() == $recipe->user_id)
                        {!! Form::open(['route' => ['recipes.destroy', $recipe->id], 'method' => 'delete']) !!}
                           {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                        <!--おきにいりボタン-->
                        
                        {!! Form::close() !!}
                        @include('recipe_favorite.favorite_button', ['recipe' =>$recipe])
                    @endif
                    </td>
                </tr>
            
                @endforeach
            </tbody>
        </table>
    @endif
@endsection