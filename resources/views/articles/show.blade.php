@extends('layouts.app')

@section('content')
    <h1>
        {{ $article->title }}
        <small>{{ $article->user->name }}</small>
    </h1>

    <hr/>
    <p>
        {{ $article->content }}
        <small>{{ $article->created_at }}</small>
    </p>

@stop