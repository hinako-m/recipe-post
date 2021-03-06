@extends('layouts.app')

@section('content')
    @foreach ($recipes as $recipe)
            <h1>つくったレシピ</h1>

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
                
                    @if (Auth::id() == $recipe->user_id)
                        
                    @endif
            
    @endforeach