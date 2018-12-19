<nav class="navbar navbar-default navbar-static-top">
    <div class="container">

        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" id="btnLogin">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar">로그인</span>
            </button>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" id="btnJoin">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar">회원가입</span>
            </button>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" id="btnLogout">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar">로그아웃</span>
            </button>

            <a href="{{ route('articles.index') }}" class="btn btn-primary">포럼</a>



            <!-- Branding Image -->

            {{--
            <a class="navbar-brand" href="{{ auth()->check() ? route('home') : route('root') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            --}}

        </div>

        {{--
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;<li {!! str_contains(request()->path(), 'docs') ? 'class="active"' : '' !!}>
                    <a href="{{ url('docs') }}">
                        {{ trans('docs.title') }}
                    </a>
                </li>
                &nbsp;<li {!! str_contains(request()->path(), ['tags', 'articles']) ? 'class="active"' : '' !!}>
                    <a href="{{ route('articles.index') }}">
                        {{ trans('forum.title') }}
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ route('sessions.create', ['return' => urlencode($currentUrl)]) }}">
                            {{ trans('auth.sessions.title') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.create', ['return' => urlencode($currentUrl)]) }}">
                            {{ trans('auth.users.title') }}
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('sessions.destroy') }}">
                                    {{ trans('auth.sessions.destroy') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        --}}

    </div>
</nav>



<script>
    $("#btnJoin").click(function() {
        location.href='/auth/register';
    });
    $("#btnLogin").click(function() {
        location.href='/auth/login';
    });
    $("#btnLogout").click(function() {
        location.href='/auth/logout';
    });

</script>
