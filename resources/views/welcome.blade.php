@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h3>レシピ紹介サイト</h3>
            <h1>らくうまレシピ</h1>
            {!! link_to_route('signup.get', 'はじめての方はこちら', [], ['class' => 'btn btn-link']) !!}
            {!! link_to_route('login', 'ログインはこちら', [], ['class' => 'btn btn-link']) !!}
        </div>
    </div>
    @include('recipes.recipes', ['recipes' => $recipes])
@endsection
