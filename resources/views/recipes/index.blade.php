@extends('layouts.app')

@section('content')

<!--検索フォーム-->
{!! Form::open(['route' => 'recipes.index', 'method' => 'get']) !!}
    {!! Form::text('keyword', '', ['class' => 'form-control', 'placeholder' =>'料理名・食材名でレシピを検索']) !!}
    {!! Form::submit('検索', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}

<h1>レシピ一覧</h1>

@if (count($recipes) > 0)
        
        <table class="table table-bordered">
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
                        <div class="btn-toolbar">
                            <div class="btn-group">
                            @if (Auth::id() == $recipe->user_id)
                                {!! Form::open(['route' => ['recipes.destroy', $recipe->id], 'method' => 'delete']) !!}
                                   {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                            </div>
                        </div>
                        @include('recipe_favorite.favorite_button', ['recipe' =>$recipe])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
 {{ $recipes->links('pagination::bootstrap-4') }}
@endif
    
@endsection