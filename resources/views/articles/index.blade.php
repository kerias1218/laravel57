@extends('layouts.app')

@section('content')

     <div class="page-header">
         <h4>포럼<small> / 글 목록</small></h4>
     </div>

     <div class="text-right">
         <a href="{{ route('articles.create') }}" class="btn btn-primary">
             <i class="fa fa-plus-circle"></i> 새 글 쓰기
         </a>
     </div>

     <article>
         @forelse($articles as $article)
             @include('articles.partial.article', compact('article'))
         @empty
            <p class="text-center text-danger">글이 없습니다.</p>
         @endforelse
     </article>

    {{--
    <div class="container">
        <h1>포럼 글 제목</h1>
        <hr/>
        <ul>
            @forelse($articles as $article)
                <li>
                   {{ $article->title }}
                    <small>
                        by {{ $article->user->name }}
                    </small>
                </li>
            @empty
                <p>글이 없습니다.</p>
            @endforelse
        </ul>
    </div>
    --}}


    @if($articles->count())
        <div class="text-center">
            {{ $articles->render() }}
        </div>
    @endif

@stop

