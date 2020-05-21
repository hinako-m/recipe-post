@extends('layouts.app')

@section('content')

    <h1>レシピを書く</h1>

    <div class="row">
        <div class="col-10">
            {!! Form::model($recipe, ['route' => 'recipes.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', 'レシピのタイトルを入力してください', ['class' => 'form-control']) !!}
                    {!! Form::label('cooking_time', '調理時間:') !!}
                    {!! Form::text('cooking_time', '分', ['class' => 'form-control']) !!}
                    {!! Form::label('material', '材料') !!}
                    {!! Form::text('material', '材料の名前をひとつずつ記入してください', ['class' => 'form-control']) !!}
                    {!! Form::label('amount', '分量') !!}
                    {!! Form::text('amount', '材料の分量をgやmlでわかりやすく記入してください', ['class' => 'form-control']) !!}
                    {!! Form::label('cookware', '調理器具:') !!}
                    {!! Form::text('cookware', null, ['class' => 'form-control']) !!}
                    {!! Form::label('memo', 'レシピメモ:') !!}
                    {!! Form::text('memo', '・レシピの簡単な紹介<br />・元レシピのURL<br />・自分のレシピの場合は作り方の詳細',
                                            ['class' => 'form-control']) !!}
                </div>
                
                
                {!! Form::submit('レシピを投稿', ['class' => 'btn btn-primary']) !!}

    </div>

@endsection