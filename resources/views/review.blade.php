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
    <meta name="description" content="{{ $livehouse->livehouse_name }}の評判、口コミ　ライブハウスの口コミが2500件以上！「{{ Config::get('const.LIVEHOUSE_TITLE') }}」">
    <meta name="keywords" content="{{ $livehouse->livehouse_name }},口コミ,レビュー,評判,ライブハウス">
    <!-- OGP -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@kuchikomiaru"/>
    <meta property="og:url" content="{{ Config::get('const.LIVEHOUSE_URL') }}/review?id={{ $livehouse->id }}">
    <meta property="og:title" content="{{ $livehouse->livehouse_name }}の評判、口コミ" />
    <meta property="og:description" content="{{ $livehouse->livehouse_name }}の口コミを募集中！皆さんのレビューをお寄せ下さい！"/>
    <meta property="og:image" content="http://capture.heartrails.com/huge?{{ $livehouse->livehouse_url }}">

    <title>{{ $livehouse->livehouse_name }}の評判、口コミ｜ライブハウスレビュー</title>
    <link rel="icon" href="assets/images/favicon.ico" sizes="32x32">
    <!-- VENDOR STYLES -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto Condensed:400,700">
    <!-- COMMON STYLES -->
    <link rel="stylesheet" media="screen" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css">
    <link rel="stylesheet" href="assets/css/jquery.rateyo.min.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzLr20b8fgaSPWJn1tqcFVxfVVhj-j-eM" type="text/javascript"></script>
    <script type="text/javascript">
        var geocoder = new google.maps.Geocoder();
        var address = "{{ $livehouse->address }}";
        geocoder.geocode({'address': address,'language':'ja'},function(results, status){
            if (status == google.maps.GeocoderStatus.OK){
                var latlng=results[0].geometry.location;// 緯度と経度を取得
                var mapOpt = {
                    center: latlng,// 取得した緯度経度を地図の真ん中に設定
                    zoom: 15,// 地図倍率1～20
                    mapTypeId: google.maps.MapTypeId.ROADMAP// 普通の道路マップ
                };
                var map = new google.maps.Map(document.getElementById('google_map'),mapOpt);
                var marker = new google.maps.Marker({// 住所のポイントにマーカーを立てる
                    position: map.getCenter(),
                    map: map
                });
            }
        });
    </script>
</head>

<body>
<div class="wrap">
    <!-- header -->
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">
                <a href="{{ route('livehouse_list') }}">
                    <picture>
                        <img src="assets/images/img-logo.png" alt="{{ Config::get('const.LIVEHOUSE_TITLE') }}">
                    </picture>
                </a>
            </h1>
            <div class="header__menu-wrap">
                <div class="header__menu">
                    <div class="header__main-menu">
                        <ul class="header__menu-list">
                            <li class="header__menu-item"><a href="#regionlist"><i class="fas fa-map-marker-alt"></i> 都道府県一覧</a></li>
                            <li class="header__menu-item"><a href="{{ route('ranking') }}"><i class="fas fa-trophy"></i> ランキング</a></li>
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

    <div class="bread">
        <ul class="bread__list">
            <li class="bread__item"><a href="{{ route('livehouse_list') }}">TOP</a></li>
            <li class="bread__item"><a href="{{ route('livehouse_list') }}#area{{ $livehouse->area }}">{{ Config::get('const.AREA')[$livehouse->area] }}</a></li>
            <li class="bread__item"><a href="{{ route('livehouse_list') }}#{{ $livehouse->region }}">{{ $livehouse->region }}</a></li>
        </ul>
    </div>

    <!-- ライブハウス情報 -->
    <div class="detail__main" id="livehouse_like">
        <div class="detail__top">
            <!-- ライブハウス画像 -->
            <div class="detail_photo">
                <img src='http://capture.heartrails.com/huge?{{ $livehouse->livehouse_url }}'>
            </div>

            <!-- ライブハウス詳細 -->
            <div class="detail__discription">
                <div class="detail__placeTitle">
                    <p class="detail__placeName">{{ $livehouse->livehouse_name }}</p>
                    <p class="detail__areaName">{{ Config::get('const.REGION_SHORT')[$livehouse->region] }}</p>
                </div>
                <div class="detail-discription__middle">
                    <p class="comment-recommend">
                        {!! \App\Enums\CommonStatus::getStarIcon($livehouse->average_points) !!}
                        {{ $livehouse->average_points ? $livehouse->average_points : '' }}
                    </p>
                    <p class="comment-like">
                        <i class="fas fa-heart"></i>{{ $livehouse->livehouse_like }}
                    </p>
                </div>
                <p class="detail__main-text">{!! nl2br(e($livehouse->livehouse_detail)) !!}</p>
                <div class="detail__info">
                    <span class="detail__capa-genre"><i class="fa fa-users"></i> キャパシティ：約{{ $livehouse->capacity }}人</span>
                    <span class="detail__capa-genre"><i class="fas fa-headphones"></i> {{ $livehouse->genre }}</span>
                </div>

                <!-- タグ -->
                <ul class="detail__main-tag__list">
                    <li class="detail__main-tag__item">{{ $livehouse->tag1 }}</li>
                    @if ($livehouse->tag2)<li class='detail__main-tag__item'>{{ $livehouse->tag2 }}</li>@endif
                    @if ($livehouse->tag3)<li class='detail__main-tag__item'>{{ $livehouse->tag3 }}</li>@endif
                </ul>

                <!-- SNSリンク -->
                <ul class="detail__main-sns__list">
                    <!-- Twitter -->
                    <li class="detail__main-sns__item">
                        <a
                            href="https://twitter.com/share"
                            target="_blank"
                            data-via="kuchikomiaru"
                            data-url="{{ Config::get('const.LIVEHOUSE_URL') }}/review?id={{ $livehouse->id }}"
                            data-text="「{{ Config::get('const.LIVEHOUSE_TITLE') }}」{{ $livehouse->livehouse_name }}の口コミ"
                            data-hashtags="{{ $livehouse->livehouse_name }}"
                        >
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <!-- LINE -->
                    <li class="detail__main-sns__item">
                        <div class="line-it-button" data-lang="ja" data-type="share-d" data-url="" style="display: none;"></div>
                    </li>
                    <!-- Facebook -->
                    <li class="detail__main-sns__item">
                        <div class="fb-share-button" data-href="{{ Config::get('const.LIVEHOUSE_URL') }}/review?id={{ $livehouse->id }}" data-layout="button" data-size="small" data-mobile-iframe="true">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                    </li>

                    <!-- ライブハウスのいいね -->
                    <li class="detail__main-sns__item">
                        <form name="livehouse_like" method="post" action="/livehouse_like_update/{{ $livehouse->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="javascript:document.livehouse_like.submit()">
                                <div class="like-icon"><i class="fas fa-heart"></i><p>いいね</p></div>
                            </a>
                        </form>
                    </li>
                    <li class="detail__main-sns__item"><a href="#comment"><i class="far fa-comment"></i> 口コミを投稿</a></li>
                </ul>

            </div>
        </div>

        <!-- 公式サイト・地図 -->
        <ul class="detail-link__list">
            <li>
                <a href="{{ $livehouse->livehouse_url }}" target="_blank" onClick="hogeFunction();return false;" class="detail-link__item">
                    <i class="fas fa-desktop"></i>公式HPへ
                </a>
            </li>
            <li><a href="javascript:void(0)" onClick="hogeFunction();return false;" class="detail-link__item detail-btn__comment"><i class="far fa-comment"></i>口コミ</a></li>
            <li><a href="javascript:void(0)" onClick="hogeFunction();return false;" class="detail-link__item detail-btn__map"><i class="fas fa-map-marker-alt"></i>地図</a></li>
        </ul>
    </div>

    <div class="main page-comment page-detail" id="review">
        <!-- 口コミタブ -->
        <div class="main-center">
            <div class="detail-tab__comment">
                <h2 class="detail__page-title"><i class="far fa-comment"></i> {!! \App\Enums\CommonStatus::getReviewText($review_type) !!}</h2>
                @if ($review_count)
                    <p class="page-sort__item page-sort__item-text"><i class="fas fa-user"></i>レビュー数：{{ $review_count }}件</p>
                    <ul class="page-sort__list">
                        <li class="page-sort__item"><a href="review?id={{ $livehouse->id }}&review_type=1#review"><i class="fas fa-sort"></i>新着順</a></li>
                        <li class="page-sort__item"><a href="review?id={{ $livehouse->id }}&review_type=2#review"><i class="fas fa-sort"></i>評価順</a></li>
                        <li class="page-sort__item"><a href="review?id={{ $livehouse->id }}&review_type=3#review"><i class="fas fa-sort"></i>いいね順</a></li>
                        @if ($is_player_review)
                            <li class="page-sort__item"><a href="review?id={{ $livehouse->id }}&review_type=4#review"><i class="fas fa-sort"></i>お客さん</a></li>
                            <li class="page-sort__item"><a href="review?id={{ $livehouse->id }}&review_type=5#review"><i class="fas fa-sort"></i>出演者</a></li>
                        @endif
                    </ul>
                @endif

                    @foreach($reviews as $review)
                        <li class='main__comment-item' id='review{{ $review->id }}'>
                            <div class='comment-item__top'>
                                <!-- 顔アイコン・ユーザーネーム -->
                                <p class='comment-name'>
                                    {!! \App\Enums\CommonStatus::getFaceIcon($review->points) !!}
                                    {{ $review->user_name }}<span class='small-text'>さん</span>
                                </p>
                                @if ($review->official_flg)
                                    <!-- 公認アイコン -->
                                    <span class='official'><i class='fas fa-check-circle'></i> 公認</span>
                                @else
                                    <!-- ユーザータイプ -->
                                    {!! Config::get('const.USER_TYPE_ICON')[$review->user_type] !!}
                                @endif
                            </div>
                            <div class='detail__comment'>
                                <!-- 評価 -->
                                <p class='comment-recommend'>
                                    {!! \App\Enums\CommonStatus::getStarIcon($review->points) !!}{{ $review->points }}
                                </p>
                                <!-- タイトル -->
                                <p class='comment-item__title'>「{{ $review->title }}」</p>
                                <!-- コメント -->
                                <div class='detail__triangle'></div>
                                <p class='comment-item__text'>{!! nl2br(e($review->comments)) !!}</p>
                            </div>
                            <div class='comment-item__bottom'>
                                <!-- 登校日 -->
                                <p class='comment-day'>投稿日：{{ $review->regist_date->format('Y-m-d') }}</p>
                                <!-- いいね -->
                                <form method='POST' name='like' action='/review_like_update/{{ $review->id }}'>
                                    <span class='detail__like'><i class='fas fa-heart'></i>{{ $review->comments_like }}</span>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type='hidden' name='comment_like' value=''>
                                    <input type='submit' name='like' class='like-submit' value='いいね！'>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{--<div class="comment-more" >--}}
                {{--<a @click="isMore">--}}
                    {{--口コミをもっと見る<i class="fas fa-angle-right"></i>--}}
                {{--</a>--}}
            {{--</div>--}}

            <!-- 地図タブ -->
            <div class="detail-tab__map">
                <h2 class="detail__page-title">{{ $livehouse->livehouse_name }}のマップ</h2>
                <ul class="page-sort__list">
                    <li class="page-sort__item"><i class="fas fa-map-marker-alt red"></i> {{ $livehouse->address }}</li>
                </ul>
                <div id="google_map" style="width:100%;height:500px"></div>
            </div>

            <!-- 口コミを投稿 -->
            <div class="comment-post margin-top-s" id="comment">
                <h3 class="comment-post__title"><i class="fas fa-edit"></i>{{ $livehouse->livehouse_name }}の口コミを投稿</h3>
                <p class="comment-post__text">
                    個人名、誹謗中傷等の書き込みは禁止。<br>
                    その他、不適切な投稿は削除致します。
                    <!-- エラーメッセージ -->
                    @if ($errors->any())
                        <br>
                        @foreach ($errors->all() as $error)
                            ・ <span class="red">{{ $error }}</span><br>
                        @endforeach
                    @endif
                </p>
                <form method="post" action="/review_store">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="comment-post__wrap">
                        <!-- 評価 -->
                        <dl class="comment-post__list">
                            <dt><i class="far fa-smile"></i> 評価 <span id="getRating" class="rate">0</span></dt>
                            <dd class="hyouka-wrap">
                                <div id="rateYo"></div>
                                <input type="hidden" name="points" value="0">
                            </dd>
                        </dl>
                        <!-- ニックネーム -->
                        <dl class="comment-post__list">
                            <dt><i class="fa fa-user"></i> ニックネーム</dt>
                            <dd><input type="text" name="user_name" placeholder="名無しの場合は未入力でOK！" value="{{ old('user_name') }}"></dd>
                        </dl>
                        <!-- タイトル -->
                        <dl class="comment-post__list">
                            <dt><i class="fa fa-tag"></i> タイトル</dt>
                            <dd><input type="text" name="title" placeholder="スタッフさんの対応がとても親切でした♪" value="{{ old('title') }}"></dd>
                        </dl>
                        <!-- レビューの種類 -->
                        <dl class="comment-post__list margin-top-select">
                            <dt><i class="fas fa-map-marker-alt"></i> レビューの種類</dt>
                            <dd>
                                <div class="cp_ipselect cp_sl01">
                                    <select name="user_type" required>
                                        <option value="0" @if (old('user_type') == 0) selected @endif>お客さんのレビュー</option>
                                        <option value="1" @if (old('user_type') == 1) selected @endif>出演者のレビュー</option>
                                        <option value="2" @if (old('user_type') == 2) selected @endif>その他（関係者など）</option>
                                    </select>
                                </div>
                            </dd>
                        </dl>
                        <!-- コメント -->
                        <dl class="comment-post__list">
                            <dt><i class="fa fa-comments"></i> コメント</dt>
                            <dd><textarea name="comments" id="" cols="30" rows="10" placeholder="良かった点、悪かった点など具体的に！">{{ old('comments') }}</textarea></dd>
                        </dl>
                        <input type="hidden" name="id" value="{{ $livehouse->id }}">
                        <!-- 投稿ボタン -->
                        <div class="send-button">
                            <div class="button">
                                <input type="submit" value="　 口コミを投稿">
                                <i class="fas fa-upload"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- 近隣ライブハウス -->
            <div class="search-stadio" id="regionlist">
                <div class="search-stadio__another">
                    <h3 class="search-stadio__title"><i class="fas fa-cube"></i>近くのライブハウス</h3>
                    <div class="search-stadio__another-wrap">
                        @foreach($around_livehouse as $livehouse)
                            <div class='search-stadio__another-block'>
                                <ul class='search-stadio__another-list'>
                                    <li class='search-stadio__another-item'>
                                        <!-- ライブハウス名 -->
                                        <a href='{{ route('review') }}?id={{ $livehouse->id }}'><i class='fas fa-cube'></i> {{ $livehouse->livehouse_name }}</a><br>
                                        <!-- レビューが3件以上の場合は評価とレビュー数を表示 -->
                                        @if ($livehouse->review_count >= 3)
                                            <span class='yellow'>{!! \App\Enums\CommonStatus::getStarIcon($livehouse->average_points) !!}</span>
                                            {{ $livehouse->average_points }}<br>
                                            <i class='far fa-comment green'></i> {{ $livehouse->review_count }}件のレビュー
                                        @elseif ($livehouse->review_count >= 1)
                                            <!-- レビューがある場合はレビュー数を表示 -->
                                            <i class='far fa-comment green'></i> {{ $livehouse->review_count }}件のレビュー
                                        @else
                                            <i class='far fa-comment green'></i> レビュー募集中！
                                        @endif
                                        <!-- いいね -->
                                        <i class='fas fa-heart red'></i> {{ $livehouse->livehouse_like }}<br>
                                        <!-- 詳細 -->
                                        {!! nl2br(e($livehouse->livehouse_detail)) !!}
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- 他のライブハウスを探す -->
            <div class="search-stadio" id="regionlist">
                <div class="search-stadio__another">
                    <h3 class="search-stadio__title"><i class="fas fa-search"></i>他のライブハウスを探す</h3>
                    <div class="search-stadio__another-wrap">
                        <div class="search-stadio__another-block">
                            <ul class="search-stadio__another-list">
                                <li class="search-stadio__another-item another-item__title">-北海道・東北-</li>
                                @foreach(Config::get('const.REGION_BY_AREA')[1] as $region)
                                    <li class='search-stadio__another-item'><a href='{{ route('livehouse_list') }}#{{ $region }}'>{{ Config::get('const.REGION_SHORT')[$region] }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="search-stadio__another-list">
                                <li class="search-stadio__another-item another-item__title">-中部-</li>
                                @foreach(Config::get('const.REGION_BY_AREA')[2] as $region)
                                    <li class='search-stadio__another-item'><a href='{{ route('livehouse_list') }}#{{ $region }}'>{{ Config::get('const.REGION_SHORT')[$region] }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="search-stadio__another-list">
                                <li class="search-stadio__another-item another-item__title">-関東-</li>
                                @foreach(Config::get('const.REGION_BY_AREA')[3] as $region)
                                    <li class='search-stadio__another-item'><a href='{{ route('livehouse_list') }}#{{ $region }}'>{{ Config::get('const.REGION_SHORT')[$region] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="search-stadio__another-block">
                            <ul class="search-stadio__another-list">
                                <li class="search-stadio__another-item another-item__title">-近畿-</li>
                                @foreach(Config::get('const.REGION_BY_AREA')[4] as $region)
                                    <li class='search-stadio__another-item'><a href='{{ route('livehouse_list') }}#{{ $region }}'>{{ Config::get('const.REGION_SHORT')[$region] }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="search-stadio__another-list">
                                <li class="search-stadio__another-item another-item__title">-中国-</li>
                                @foreach(Config::get('const.REGION_BY_AREA')[5] as $region)
                                    <li class='search-stadio__another-item'><a href='{{ route('livehouse_list') }}#{{ $region }}'>{{ Config::get('const.REGION_SHORT')[$region] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="search-stadio__another-block">
                            <ul class="search-stadio__another-list">
                                <li class="search-stadio__another-item another-item__title">-四国-</li>
                                @foreach(Config::get('const.REGION_BY_AREA')[6] as $region)
                                    <li class='search-stadio__another-item'><a href='{{ route('livehouse_list') }}#{{ $region }}'>{{ Config::get('const.REGION_SHORT')[$region] }}</a></li>
                                @endforeach
                            </ul>
                            <ul class="search-stadio__another-list">
                                <li class="search-stadio__another-item another-item__title">-九州・沖縄-</li>
                                @foreach(Config::get('const.REGION_BY_AREA')[7] as $region)
                                    <li class='search-stadio__another-item'><a href='{{ route('livehouse_list') }}#{{ $region }}'>{{ Config::get('const.REGION_SHORT')[$region] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main-side -->
        <div class="main-side">
            <!-- ad -->
            <a href="https://px.a8.net/svt/ejp?a8mat=2ZPE6I+7IW90Y+3PT8+60H7L" target="_blank" rel="nofollow">
                <img border="0" width="240" height="210" alt="" src="https://www25.a8.net/svt/bgt?aid=180903690455&wid=001&eno=01&mid=s00000017342001010000&mc=1">
            </a>
            <img border="0" width="1" height="1" src="https://www10.a8.net/0.gif?a8mat=2ZPE6I+7IW90Y+3PT8+60H7L">

            <!-- サイド都道府県リスト -->
            <ul class="side__list margin-top-s">
                <li><a href="{{ route('livehouse_list') }}#area1" class="side__item side__item-first">北海道・東北</a></li>
                <li><a href="{{ route('livehouse_list') }}#area2" class="side__item">中部</a></li>
                <li><a href="{{ route('livehouse_list') }}#area3" class="side__item">関東</a></li>
                <li><a href="{{ route('livehouse_list') }}#area4" class="side__item">近畿</a></li>
                <li><a href="{{ route('livehouse_list') }}#area5" class="side__item">中国</a></li>
                <li><a href="{{ route('livehouse_list') }}#area6" class="side__item">四国</a></li>
                <li><a href="{{ route('livehouse_list') }}#area7" class="side__item">九州・沖縄</a></li>
            </ul>

            <!-- ad -->
            <a href="https://px.a8.net/svt/ejp?a8mat=2ZPJOR+GC8AGI+3XIQ+BYLJL" target="_blank" rel="nofollow">
                <img class="margin-top-s" border="0" width="240" height="210" alt="" src="https://www24.a8.net/svt/bgt?aid=180910827988&wid=001&eno=01&mid=s00000018341002009000&mc=1">
            </a>
            <img border="0" width="1" height="1" src="https://www18.a8.net/0.gif?a8mat=2ZPJOR+GC8AGI+3XIQ+BYLJL">

            <!-- 新着レビュー -->
            <div class="search-stadio__another-item another-item__title margin-top-ss"><i class="far fa-comment"></i> 新着レビュー</div>
            @foreach($newly_reviews as $review)
                <ul class='search-stadio__another-list'>
                    <li class='search-stadio__another-item'>
                        <small>
                            <!-- ライブハウス名 -->
                            <a href='{{ route('review') }}?id={{ $review->livehouse_id }}'><i class='fas fa-cube'></i> {{ $review->livehouse->livehouse_name }}</a><br>
                            <!-- 評価 -->
                            {!! \App\Enums\CommonStatus::getFaceIcon($review->points) !!}
                            <span class='red'>{!! \App\Enums\CommonStatus::getStarIcon($review->points) !!} {{ $review->points }}<br></span>
                            <!-- タイトル -->
                            「{{ $review->title }}」<br>
                            <!-- コメント -->
                            <span class='color'>
                                <i class='far fa-comment'></i> {!! mb_strimwidth(nl2br(e($review->comments)), 0, 280, "...", 'UTF-8') !!}<br>
                            </span>
                            <!-- 日付 -->
                            投稿日：{{ $review->regist_date->format('Y-m-d') }}
                        </small>
                    </li>
                </ul>
                <hr>
            @endforeach
        </div>
    </div>

    @include('footer')

    <div class="page-top">
        <i class="fas fa-long-arrow-alt-up"></i>
    </div>
</div>
<!-- /wrap -->

<!-- SNS -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/jquery.rateyo.js"></script>
<script>
    window.FontAwesomeConfig = {
        searchPseudoElements: true
    };
    $(function () {
        $("#rateYo").rateYo()
            .on("rateyo.set", function (e, data) {
                $("#getRating").text(data.rating);
                $('input[name="points"]').val(data.rating);
            });
    });
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1682747858325769",
        enable_page_level_ads: true
    });
</script>
</body>