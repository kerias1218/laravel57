@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>회원가입</h1>
        <hr/>

        <form action="/users/create" method="POST">
            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('pu_email')?'has-error':'' }}">
                <label for="pu_email">이메일</label>
                <input type="text" name="pu_email" id="pu_email" value="{{ old('pu_email') }}" class="form-control">
                {!! $errors->first('pu_email','<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('pu_keyword')?'has-error':'' }}">
                <label for="pu_email">검색 키워드</label>
                <input type="text" name="pu_keyword" id="pu_keyword" value="{{ old('pu_keyword') }}" class="form-control">
                {!! $errors->first('pu_keyword','<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('pu_price')?'has-error':'' }}">
                <label for="pu_price">기준 가격</label>
                <input type="text" name="pu_price" id="pu_price" value="{{ old('pu_price') }}" class="form-control">
                {!! $errors->first('pu_price','<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">저 장</button>
            </div>

        </form>
    </div>
@stop


@section('scripts')
    <script>
    </script>
@stop