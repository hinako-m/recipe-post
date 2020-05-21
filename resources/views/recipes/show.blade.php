@extends('layouts.app')

@section('content')
//showはレシピ詳細ページ
//indexやfavoriteでレシピをクリックしたときに見える
<h1></h1>
//ログインした人だけ＆自分のレシピだけ編集できる
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


@endsection