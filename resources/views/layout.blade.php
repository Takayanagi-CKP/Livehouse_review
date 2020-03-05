<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136027314-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-136027314-1');
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="日本一のライブハウスの口コミ、レビューサイト「{{ Config::get('const.LIVEHOUSE_TITLE') }}」日本全国のライブハウスの口コミを2500件以上掲載中！">
    <!-- OGP -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@kuchikomiaru"/>
    <meta property="og:url" content="{{ Config::get('const.LIVEHOUSE_URL') }}">
    <meta property="og:title" content="「{{ Config::get('const.LIVEHOUSE_TITLE') }}」" />
    <meta property="og:description" content="日本全国のライブハウスの口コミを2500件以上掲載！皆さんのレビューをお寄せ下さい！"/>
    <meta property="og:image" content="https://kuchikomiaru.com/assets/images/kuchikomiaru.png"/>
    <title>「{{ Config::get('const.LIVEHOUSE_TITLE') }}」</title>
    <link rel="icon" href="assets/images/favicon.ico" sizes="32x32">
    <!-- VENDOR STYLES -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto Condensed:400,700">
    <!-- COMMON STYLES -->
    <link rel="stylesheet" media="screen" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bulma.min.css">
    <link rel="stylesheet" href="assets/css/custum.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css">
</head>

<body class="theme-page">

<!-- Header -->
<header class="header">
    <div class="header__inner">
        <h1 class="header__logo">
            <a href="{{ route('livehouse_list') }}">
                <picture>
                    {{--<source media="(min-width:768px)" srcset="assets/images/img-logo.png">--}}
                    <img src="assets/images/img-logo.png" alt="{{ Config::get('const.LIVEHOUSE_TITLE') }}">
                </picture>
            </a>
        </h1>
        <div class="header__menu-wrap">
            <div class="header__menu">
                <div class="header__main-menu">
                    <ul class="header__menu-list">
                        <li class="header__menu-item"><a href="{{ route('livehouse_list') }}#regionlist"><i class="fas fa-map-marker-alt"></i> 都道府県一覧</a></li>
                        <li class="header__menu-item"><a href="{{ route('ranking') }}#comment_rank"><i class="fas fa-trophy"></i> ランキング</a></li>
                        <li class="header__menu-item"><a href="{{ route('livehouse_list') }}#search"><i class="fas fa-search"></i> 検索</a></li>
                    </ul>
                </div>
                <div class="header__menu-btn">
                    <p class="menu-trigger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </p>
                    <p class="header__menu-btn-text">MENU</p>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- アイキャッチ画像 -->
<section>
    <figure class="image">
        <img src="assets/images/kuchikomiaru.png" alt="{{ Config::get('const.LIVEHOUSE_TITLE') }}">
    </figure>
</section>

@yield('content')

</body>
</html>