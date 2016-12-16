<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="word-wrap:break-word;">


<div class="container" style="width: 500px;">
    <div class="row">
        <h1 style="text-align: center">TEST</h1>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/guestbook">
                        <img alt="首页" src="...">
                    </a>
                    <a class="navbar-brand" href="/guestbook/create">
                        <img alt="发表" src="...">
                    </a>
                    @if (Auth::guest())
                        <a class="navbar-brand" href="/login">
                            <img alt="登录" src="...">
                        </a>
                        <a class="navbar-brand" href="/register">
                            <img alt="注册" src="...">
                        </a>
                    @else
                        <a class="navbar-brand" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <a class="navbar-brand" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            退出登录
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>
        </nav>




