@extends('layouts.app')



    @section('content')
        <p>자식뷰의 content 섹션</p>
        <p>{{ $arr['aa'] }}</p>
        @include('partials.footer')
    @endsection

