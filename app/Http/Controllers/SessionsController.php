<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
           'email'=>'required|email',
           'password'=>'required|min:6',
        ]);

        if(! auth()->attempt($request->only('email','password'), $request->has('remember'))) {
            return $this->flashMsg('이메일 또는 비밀번호가 맞지 않습니다.');
        }

        if(! auth()->user()->activated) {
            auth()->logout();
            return $this->flashMsg('가입 확인해주세요.');
        }

        flash(auth()->user()->name.' 님 환영합니다.');
        return redirect()->intended('/');
    }

    public function destroy() {
        auth()->logout();
        return $this->flashMsg('또 방문해 주세요.');
    }

    public function flashMsg($msg) {
        flash($msg);
        return redirect('/');
    }

}
