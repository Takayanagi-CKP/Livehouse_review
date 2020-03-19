@extends('layout')
@section('content')
    <div class="columns">
        <!-- PCサイドメニュー -->
        <div class="column is-2">
            <aside class="menu section side sp-hidden">
                <div class="box">
                    <a href="{{ route('livehouse_list') }}#regionlist"><p class="menu-label"> <i class="fas fa-map-marker-alt"></i> 地域で探す</p></a>
                    <ul class="menu-list">
                        <li><a href="{{ route('livehouse_list') }}#area1">北海道・東北</a></li>
                        <li><a href="{{ route('livehouse_list') }}#area2">中部</a></li>
                        <li><a href="{{ route('livehouse_list') }}#area3">関東</a></li>
                        <li><a href="{{ route('livehouse_list') }}#area4">近畿</a></li>
                        <li><a href="{{ route('livehouse_list') }}#area5">中国</a></li>
                        <li><a href="{{ route('livehouse_list') }}#area6">四国</a></li>
                        <li><a href="{{ route('livehouse_list') }}#area7">九州・沖縄</a></li>
                    </ul>
                    <a href="{{ route('livehouse_list') }}#東京都"><p class="menu-label"><i class="fas fa-map-marker-alt"></i> 東京エリア</p></a>
                    <ul class="menu-list">
                        <li><a href="{{ route('livehouse_list') }}#shimokitazawa">下北沢</a></li>
                        <li><a href="{{ route('livehouse_list') }}#shibuya">渋谷</a></li>
                        <li><a href="{{ route('livehouse_list') }}#shi{{ route('livehouse_list') }}njuku">新宿</a></li>
                        <li><a href="{{ route('livehouse_list') }}#ikebukuro">池袋</a></li>
                        <li><a href="{{ route('livehouse_list') }}#tokyo_other">その他</a></li>
                    </ul>
                    <a href="{{ route('livehouse_list') }}#大阪府"><p class="menu-label"><i class="fas fa-map-marker-alt"></i> 大阪エリア</p></a>
                    <ul class="menu-list">
                        <li><a href="{{ route('livehouse_list') }}#shinsaibashi">心斎橋</a></li>
                        <li><a href="{{ route('livehouse_list') }}#umeda">梅田</a></li>
                        <li><a href="{{ route('livehouse_list') }}#osaka_other">その他</a></li>
                    </ul>
                </div>
            </aside>
        </div>

        <div class="column">
            <section class="section">
                <h4 class="title is-4 color sp-small">
                    <i class="far fa-comment"></i> 全国のライブハウスの口コミを <span class="red">{{ $total_review_count }}</span> 件 掲載中！
                </h4>
                <!-- 地域で検索 -->
                <label class="label is-large"><i class="fas fa-map-marker-alt red"></i> 地域で探す</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area1">北海道・東北</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area2">中部</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area3">関東</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area4">近畿</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area5">中国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area6">四国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area7">九州・沖縄</a></p>
                </div>
                <!-- 人気のエリア -->
                <label class="label is-large"><i class="far fa-star has-text-warning"></i>人気のエリア</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shibuya">渋谷</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shinjuku">新宿</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#ikebukuro">池袋</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shimokitazawa">下北沢</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#saitama">さいたま市</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#yokohama">横浜</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shinsaibashi">心斎橋</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#umeda">梅田</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#nagoya">名古屋</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#kobe">神戸</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#hakata">博多</a></p>
                </div>
                <!-- キャパシティ -->
                <label class="label is-large" id="capacity"><i class="fas fa-users has-text-primary"></i> キャパシティで探す</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-rounded tag is-info' href="{{ route('livehouse_list') }}?capacity=1#capacity">50人以下</a></p>
                    <p class='control'><a class='is-rounded tag is-primary' href="{{ route('livehouse_list') }}?capacity=2#capacity">50 〜 99人</a></p>
                    <p class='control'><a class='is-rounded tag is-primary' href="{{ route('livehouse_list') }}?capacity=3#capacity">100 〜 199人</a></p>
                    <p class='control'><a class='is-rounded tag is-warning' href="{{ route('livehouse_list') }}?capacity=4#capacity">200 〜 299人</a></p>
                    <p class='control'><a class='is-rounded tag is-warning' href="{{ route('livehouse_list') }}?capacity=5#capacity">300 〜 499人</a></p>
                    <p class='control'><a class='tag is-rounded is-danger' href="{{ route('livehouse_list') }}?capacity=6#capacity">500人以上</a></p>
                </div>
            </section>

            <!-- ランキング -->
            <section class="section" id="rank">
                <h2 class="title is-3"><i class='fas fa-trophy icon-yellow'></i> ランキング</h2>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-medium tag is-info' href="#audience_comment_rank"><i class='fas fa-users'></i> お客さんレビューのいいね数 TOP10</a></p>
                    <p class='control'><a class='is-medium tag is-success' href="#player_comment_rank"><i class='fas fa-guitar'></i> 出演者、その他レビューのいいね数 TOP10</a></p>
                </div>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-medium tag is-warning' href="#comment_count_rank"><i class="fas fa-cube"></i> ライブハウスのレビュー件数 TOP10</a></p>
                    <p class='control'><a class='is-medium tag is-danger' href="#livehouse_point_rank"><i class="far fa-star"></i> ライブハウスの評価 TOP10</a></p>
                </div>
            </section>

            <!-- お客さんのレビューのいいね数 TOP10 -->
            <section class="section" id="audience_comment_rank">
                <h4 class="title is-4 sp-small"><i class="fas fa-users has-text-primary"></i> お客さんレビューのいいね数 TOP10</h4>
                <hr>
                @foreach($ranking_audience_comments_like as $review)
                    <div class='box'>
                        <div class='media'>
                            <div class='media-content'>
                                <h4 class='title is-4 sp-small'>
                                    @if ($loop->iteration <= 3)
                                        <i class='fas fa-trophy icon-yellow'></i>
                                    @endif
                                    {{ $loop->iteration }} 位 <i class='fas fa-heart icon-red'></i> {{ $review->comments_like }} いいね
                                </h4>
                                <small>
                                    <i class='fas fa-cube'></i> <a href="../review/?id={{ $review->livehouse->id }}" target="_blank">{{ $review->livehouse->livehouse_name }}</a><br>
                                    <i class="fas fa-user"></i> {{ $review->user_name }} <span class='red'>{!! \App\Enums\CommonStatus::getStarIcon($review->points) !!} {{ $review->points }}</span><br>
                                    「{{ $review->title }}」<br>
                                    <i class="far fa-comment has-text-primary"></i> <span class='has-text-grey'>{!! nl2br(e($review->comments)) !!}</span><br>
                                    投稿日：{{ $review->regist_date->format('Y-m-d') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

            <!-- 出演者、その他のレビューのいいね数 TOP10 -->
            <section class="section" id="player_comment_rank">
                <h4 class="title is-4 sp-small"><i class="fas fa-guitar has-text-warning"></i> 出演者、その他レビューのいいね数 TOP10</h4>
                <hr>
                @foreach($ranking_player_comments_like as $review)
                    <div class='box'>
                        <div class='media'>
                            <div class='media-content'>
                                <h4 class='title is-4 sp-small'>
                                    @if ($loop->iteration <= 3)
                                        <i class='fas fa-trophy icon-yellow'></i>
                                    @endif
                                    {{ $loop->iteration }} 位 <i class='fas fa-heart icon-red'></i> {{ $review->comments_like }} いいね
                                </h4>
                                <small>
                                    <i class='fas fa-cube'></i> <a href="../review/?id={{ $review->livehouse->id }}" target="_blank">{{ $review->livehouse->livehouse_name }}</a><br>
                                    <i class="fas fa-user"></i> {{ $review->user_name }} <span class='red'>{!! \App\Enums\CommonStatus::getStarIcon($review->points) !!} {{ $review->points }}</span><br>
                                    「{{ $review->title }}」<br>
                                    <i class="far fa-comment has-text-primary"></i> <span class='has-text-grey'>{!! nl2br(e($review->comments)) !!}</span><br>
                                    投稿日：{{ $review->regist_date->format('Y-m-d') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

            <!-- ライブハウスのレビュー件数 TOP10 -->
            <section class="section" id="comment_count_rank">
                <h4 class="title is-4 sp-small"><i class="fas fa-cube has-text-grey"></i> ライブハウスのレビュー件数 TOP10</h4>
                <hr>
                @foreach($ranking_review_count as $livehouse)
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <a href='{{ route('review') }}?id={{ $livehouse->id }}' target='blank'>
                                        <figure class="image is-128x128">
                                            <img src="http://capture.heartrails.com/huge?{{ $livehouse->livehouse_url }}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="media-content">
                                    <p class="title is-5">
                                        @if ($loop->iteration <= 3)
                                            <i class='fas fa-trophy icon-yellow'></i>
                                        @endif
                                        {{ $loop->iteration }} 位 <i class='far fa-comment green'></i> {{ $livehouse->review_count }}件<br>
                                        <i class="fas fa-cube has-text-grey"></i> {{ $livehouse->region }} / <a href='{{ route('review') }}?id={{ $livehouse->id }}' target='blank'>{{ $livehouse->livehouse_name }}</a><br>
                                    </p>
                                    <p class="subtitle is-6">
                                        評価：<span class='yellow'>{!! \App\Enums\CommonStatus::getStarIcon($livehouse->average_points) !!}</span> {{ $livehouse->average_points }}<br>
                                        <i class='fas fa-heart icon-red'></i> {{ $livehouse->livehouse_like }}
                                        <i class='fas fa-users has-text-info'></i> {{ $livehouse->capacity }}人
                                    </p>
                                </div>
                            </div>
                            <div class="content">
                                <small class='has-text-grey'>{!! nl2br(e($livehouse->livehouse_detail)) !!}</small>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </section>

            <!-- ライブハウスの評価 TOP10 -->
            <section class="section" id="livehouse_point_rank">
                <h4 class="title is-4 sp-small"><i class="far fa-star has-text-warning"></i> ライブハウスの評価 TOP10</h4>
                <small class='has-text-grey'>レビュー件数5件以上の評価平均</small>
                <hr>
                @foreach($ranking_average_points as $livehouse)
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <a href='{{ route('review') }}?id={{ $livehouse->id }}' target='blank'>
                                        <figure class="image is-128x128">
                                            <img src="http://capture.heartrails.com/huge?{{ $livehouse->livehouse_url }}">
                                        </figure>
                                    </a>
                                </div>
                                <div class="media-content">
                                    <p class="title is-5">
                                        @if ($loop->iteration <= 3)
                                            <i class='fas fa-trophy icon-yellow'></i>
                                        @endif
                                        {{ $loop->iteration }} 位 <span class='yellow'>{!! \App\Enums\CommonStatus::getStarIcon($livehouse->average_points) !!}</span> {{ $livehouse->average_points }}<br>
                                        <i class="fas fa-cube has-text-grey"></i> {{ $livehouse->region }} / <a href='{{ route('review') }}?id={{ $livehouse->id }}' target='blank'>{{ $livehouse->livehouse_name }}</a>
                                    </p>
                                    <p class="subtitle is-6">
                                        <i class='far fa-comment green'></i> レビュー{{ $livehouse->review_count }}件<br>
                                        <i class='fas fa-heart icon-red'></i> {{ $livehouse->livehouse_like }}
                                        <i class='fas fa-users has-text-info'></i> {{ $livehouse->capacity }}人
                                    </p>
                                </div>
                            </div>
                            <div class="content">
                                <small class='has-text-grey'>{!! nl2br(e($livehouse->livehouse_detail)) !!}</small>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </section>

            <section class="section">
                <!-- 地域で検索 -->
                <label class="label is-large"><i class="fas fa-map-marker-alt red"></i> 地域で探す</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area1">北海道・東北</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area2">中部</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area3">関東</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area4">近畿</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area5">中国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area6">四国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="{{ route('livehouse_list') }}#area7">九州・沖縄</a></p>
                </div>

                <!-- 人気のエリア -->
                <label class="label is-large"><i class="far fa-star has-text-warning"></i>人気のエリア</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shibuya">渋谷</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shinjuku">新宿</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#ikebukuro">池袋</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shimokitazawa">下北沢</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#saitama">さいたま市</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#yokohama">横浜</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#shinsaibashi">心斎橋</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#umeda">梅田</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#nagoya">名古屋</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#kobe">神戸</a></p>
                    <p class='control'><a class='button tag is-primary' href="{{ route('livehouse_list') }}#hakata">博多</a></p>
                </div>

                <!-- キャパシティ -->
                <label class="label is-large" id="capacity"><i class="fas fa-users has-text-primary"></i> キャパシティで探す</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-rounded tag is-info' href="{{ route('livehouse_list') }}?capacity=1#capacity">50人以下</a></p>
                    <p class='control'><a class='is-rounded tag is-primary' href="{{ route('livehouse_list') }}?capacity=2#capacity">50 〜 99人</a></p>
                    <p class='control'><a class='is-rounded tag is-primary' href="{{ route('livehouse_list') }}?capacity=3#capacity">100 〜 199人</a></p>
                    <p class='control'><a class='is-rounded tag is-warning' href="{{ route('livehouse_list') }}?capacity=4#capacity">200 〜 299人</a></p>
                    <p class='control'><a class='is-rounded tag is-warning' href="{{ route('livehouse_list') }}?capacity=5#capacity">300 〜 499人</a></p>
                    <p class='control'><a class='tag is-rounded is-danger' href="{{ route('livehouse_list') }}?capacity=6#capacity">500人以上</a></p>
                </div>

                <!-- 都道府県リスト -->
                <label class="label is-large" id="regionlist"><i class="fas fa-map-marker-alt icon-red"></i>  都道府県一覧 </label>
                <label class="label is-large">-北海道・東北-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[1] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='{{ route('livehouse_list') }}#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-中部-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[2] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='{{ route('livehouse_list') }}#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-関東-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[3] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='{{ route('livehouse_list') }}#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-近畿-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[4] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='{{ route('livehouse_list') }}#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-中国-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[5] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='{{ route('livehouse_list') }}#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-四国-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[6] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='{{ route('livehouse_list') }}#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-九州・沖縄-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[7] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='{{ route('livehouse_list') }}#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
            </section>

            <section class="section has-text-centered">
                <label class="label is-large">新着レビュー</label>
                <div id="css-slider">
                    <div class="slider-wrapper">
                        @foreach($newly_reviews as $review)
                            <div class='slide-item'>
                                <div class='box'>
                                    <div class='media'>
                                        <div class='media-content'>
                                            <span class='content'>
                                                <a href='{{ route('review') }}?id={{ $review->livehouse_id }}'>
                                                    <i class='fas fa-cube'></i> {{ $review->livehouse->livehouse_name }}
                                                </a><br>
                                                <small>
                                                    <!-- 評価 -->
                                                    {!! \App\Enums\CommonStatus::getFaceIcon($review->points) !!}
                                                    <span class='red'>{!! \App\Enums\CommonStatus::getStarIcon($review->points) !!} {{ $review->points }}<br></span>
                                                    <!-- タイトル -->
                                                    「{{ $review->title }}」<br>
                                                    <!-- コメント -->
                                                    <span class='color'>
                                                        <i class='far fa-comment'></i> {!! mb_strimwidth(nl2br(e($review->comments)), 0, 200, "...", 'UTF-8') !!}<br>
                                                    </span>
                                                    <!-- 日付 -->
                                                    投稿日：{{ $review->regist_date->format('Y-m-d') }}
                                                </small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('footer')

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- メニュー -->
    <script src="assets/js/animation.js"></script>
    <!-- アドセンス -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-1682747858325769",
            enable_page_level_ads: true
        });
    </script>
@endsection