@extends('layouts.app')

@section('content')

    <div class="page-header">
        <h4>포럼<small> / {{ $article->title }}</small></h4>
    </div>

    <article data-id="{{ $article->id }}">
        @include('articles.partial.article', compact('article'))

        <p>{!! markdown($article->content) !!}</p>
    </article>

    <div class="text-center action__article">

        @can('update', $article)
        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info">
            <i class="fa fa-pencil"></i> 글 수정
        </a>
        @endcan
        @can('delete',$article)
        <button class="btn btn-danger button__delete">
            <i class="fa fa-trash-o"></i> 글 삭제
        </button>
        @endcan
        <a href="{{ route('articles.index') }}" class="btn btn-default">
            <i class="fa fa-list"></i> 글 목록
        </a>
    </div>

@stop


@section('scripts')
    <script>

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : token
            }
        });

        $('.button__delete').on('click', function(e){
            var articleId = $('article').data('id');

            if(confirm('정말 삭제?')) {
                $.ajax({
                    type:'DELETE',
                    url:'/articles/'+articleId,
                    data: { _token:token }
                }).then(function(){
                    window.location.href='/articles';
                });
            }
        });

    </script>
@stop