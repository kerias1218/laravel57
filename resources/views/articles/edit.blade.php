@extends('layouts.app')

@section('content')

    <div class="page-header">
        <h4>포럼 <small> / 글 수정 / {{ $article->title }}</small></h4>
    </div>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}

        @include('articles.partial.form')

        <div class="form-group">
            <button class="btn btn-primary">수정하기</button>
        </div>
        <a href="{{ route('articles.index') }}" class="btn btn-default">
            <i class="fa fa-list"></i> 글 목록
        </a>
    </form>

@stop