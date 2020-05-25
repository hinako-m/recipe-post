@extends('layouts.app')

@section('content')

<h1>レシピを編集</h1>

    <div class="row">
        <div class="col-10">
            {!! Form::model($recipe, ['route' => ['recipes.update', $recipe->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' =>'レシピのタイトルを入力してください']) !!}       
                    {!! Form::label('cooking_time', '調理時間:') !!}
                    {!! Form::text('cooking_time', '分', ['class' => 'form-control']) !!}
                    {!! Form::label('material', '材料') !!}
                    {!! Form::text('material', '', ['class' => 'form-control', 'placeholder'=>'材料の名前をひとつずつ記入してください']) !!}
                    {!! Form::label('amount', '分量') !!}
                    {!! Form::text('amount', '', ['class' => 'form-control', 'placeholder'=>'材料の分量をgやmlでわかりやすく記入してください']) !!}
                    {!! Form::label('cookware', '調理器具:') !!}
                    {!! Form::text('cookware', null, ['class' => 'form-control']) !!}
                    {!! Form::label('memo', 'レシピメモ:') !!}
                    {!! Form::text('memo', '', ['class' => 'form-control', 'placeholder'=>'・レシピの簡単な紹介<br />・元レシピのURL<br />・自分のレシピの場合は作り方の詳細']) !!}
                                
                </div>
        
                {!! Form::submit('完了', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection