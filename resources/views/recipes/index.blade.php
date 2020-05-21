@extends('layouts.app')

@section('content')

<h1>レシピ一覧</h1>

@if (count($recipes) > 0)
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タイトル</th>
                    <th>調理時間</th>
                    <th>調理器具</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $recipe)
                <tr>
                    <td>{!! link_to_route('recipes.show', $recipe->id, ['id' => $recipe->id]) !!}</td>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->cooking_time }}</td>
                    <td>{{ $recipe->cookware }}</td>
                    
                    @if (Auth::id() == $recipe->user_id)
                        {!! Form::open(['route' => ['recipes.destroy', $recipe->id], 'method' => 'delete']) !!}
                           <td> {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}</td>
                        {!! Form::close() !!}
                    @endif
                </tr>
            
                @endforeach
            </tbody>
        </table>
    
        
    @endif
    
@endsection