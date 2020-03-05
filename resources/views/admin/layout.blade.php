<html>
<head>
    <title>ライブハウス管理</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.0/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('admin_livehouses') }}">Livehouse Admin</a>
    <div class="navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_livehouses') }}"><i class='fas fa-cube'></i> ライブハウス管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_reviews') }}"><i class="far fa-comment"></i> レビュー管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_ranking') }}"><i class="far fa-chart-bar"></i> ランキング</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('livehouse_list') }}" target="_blank"><i class="fas fa-desktop"></i> トップ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ Config::get('const.TWITTER_URL') }}" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <p>ようこそ、{{ Auth::user()->name }}さん！</p>
    @yield('content')
</div>

<footer class="footer text-center">
    <div class="copyright">Copyright © {{ \Carbon\Carbon::now()->format("Y") }} Tunetrust Corporation. All rights reserved</div>
</footer>
</body>
</html>