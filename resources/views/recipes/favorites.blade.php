@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('recipes.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('recipes.navtabs', ['user' => $user])
            @include('recipes.index', ['recipes' => $recipes])
        </div>
    </div>
@endsection