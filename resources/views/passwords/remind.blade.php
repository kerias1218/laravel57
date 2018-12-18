@extends('layouts.app')


@section('content')
    <div class="container">
        <form action="{{ route('remind.store') }}" method="POST" role="form" class="form__auth">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" name="email" calss="form-control" placeholder="{{ trans('auth.form.email') }}" value="{{ old('email') }}" autofocus>
                {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" type="submit">
                    비밀번호 변경
                </button>
            </div>

        </form>
    </div>
@stop
