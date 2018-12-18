@extends('layouts.app')

@section('content')


    <div class="page-header">
        <h4>로그인</h4>
        <p class="text-muted">
                깃허브 계정으로 로그인 하세요. {{ config('app.name') }} 계정으로 로그인 할수 있습니다.
        </p>
    </div>
    <div class="form-group">
        <a class="btn btn-danger btn-lg btn-block" href="{{ route('social.login', ['github']) }}">
            <strong><i class="fa fa-githhub"></i> Github 계정으로 로그인</strong>
        </a>
    </div>

    <form action="{{ route('sessions.store') }}" method="POST" class="form__auth">
        {!! csrf_field() !!}

        <div class="form-group ">
            <input type="text" name="email" class="form-control" placeholder="이메일" value="{{ old('email') }}" autofocus>
            {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>
        <div class="form-group ">
            <input type="password" name="password" class="form-control" placeholder="패스워드" value="{{ old('password') }}" autofocus>
            {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                 로그인
            </button>
        </div>

        <div>
            <p class="text-center">회원이 아니라면 <a href="{{ route('users.create') }}">가입하세요</a>
            </p>

            <p class="text-center"><a href="{{ route('remind.create') }}">비밀번호를 잊으셨나요?</a>

            </p>
        </div>


    </form>

@stop