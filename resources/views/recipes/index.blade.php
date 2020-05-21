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
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
@endsection