@extends('layout')
@section('content')
    <div class="columns">
        <!-- PCサイドメニュー -->
        <div class="column is-2">
            <aside class="menu section side sp-hidden">
                <div class="box">
                    <a href="#regionlist"><p class="menu-label"> <i class="fas fa-map-marker-alt"></i> 地域で探す</p></a>
                    <ul class="menu-list">
                        <li><a href="#area1">北海道・東北</a></li>
                        <li><a href="#area2">中部</a></li>
                        <li><a href="#area3">関東</a></li>
                        <li><a href="#area4">近畿</a></li>
                        <li><a href="#area5">中国</a></li>
                        <li><a href="#area6">四国</a></li>
                        <li><a href="#area7">九州・沖縄</a></li>
                    </ul>
                    <a href="#東京都"><p class="menu-label"><i class="fas fa-map-marker-alt"></i> 東京エリア</p></a>
                    <ul class="menu-list">
                        <li><a href="#shimokitazawa">下北沢</a></li>
                        <li><a href="#shibuya">渋谷</a></li>
                        <li><a href="#shinjuku">新宿</a></li>
                        <li><a href="#ikebukuro">池袋</a></li>
                        <li><a href="#tokyo_other">その他</a></li>
                    </ul>
                    <a href="#大阪府"><p class="menu-label"><i class="fas fa-map-marker-alt"></i> 大阪エリア</p></a>
                    <ul class="menu-list">
                        <li><a href="#shinsaibashi">心斎橋</a></li>
                        <li><a href="#umeda">梅田</a></li>
                        <li><a href="#osaka_other">その他</a></li>
                    </ul>
                </div>
            </aside>
        </div>

        <!-- メインコンテンツ -->
        <div class="column">

            <section class="section">
                <!-- レビュー件数 -->
                <h4 class="title is-4 color sp-small">
                    <i class="far fa-comment"></i> 全国のライブハウスの口コミを <span class="red">{{ $total_review_count }}</span> 件 掲載中！
                </h4>

                <!-- 新着情報 -->
                <small>
                    <span class="tag is-link is-small is-danger">New!</span><br>
                    2019/11/26 「<a href="#area4">近畿エリア</a>」のライブハウスを追加しました！<br>
                    2019/08/06 「お客さん」と「出演者」を選んでレビュー出来るようになりました！
                </small>
                <hr>

                <!-- 新着レビュー -->
                <label class="label is-large">新着レビュー</label>
                <div id="css-slider">
                    <div class="slider-wrapper">
                        @foreach($newly_reviews as $review)
                            <div class='slide-item'>
                                <div class='box'>
                                    <div class='media'>
                                        <div class='media-content'>
                                            <span class='content'>
                                                <small>
                                                    <!-- ライブハウス名 -->
                                                    <a href='{{ route('review') }}?id={{ $review->livehouse_id }}'>
                                                        <i class='fas fa-cube'></i> {{ $review->livehouse->livehouse_name }}
                                                    </a><br>
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
                <hr>

                <!-- 地域で検索 -->
                <label class="label is-large"><i class="fas fa-map-marker-alt red"></i> 地域で探す</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area1">北海道・東北</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area2">中部</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area3">関東</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area4">近畿</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area5">中国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area6">四国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area7">九州・沖縄</a></p>
                </div>

                <!-- 人気のエリア -->
                <label class="label is-large"><i class="far fa-star has-text-warning"></i>人気のエリア</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button tag is-primary' href="#shibuya">渋谷</a></p>
                    <p class='control'><a class='button tag is-primary' href="#shinjuku">新宿</a></p>
                    <p class='control'><a class='button tag is-primary' href="#ikebukuro">池袋</a></p>
                    <p class='control'><a class='button tag is-primary' href="#shimokitazawa">下北沢</a></p>
                    <p class='control'><a class='button tag is-primary' href="#kichijoji">吉祥寺</a></p>
                    <p class='control'><a class='button tag is-primary' href="#akasaka">赤坂</a></p>
                    <p class='control'><a class='button tag is-primary' href="#yokohama">横浜</a></p>
                    <p class='control'><a class='button tag is-primary' href="#saitama">さいたま市</a></p>
                </div>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button tag is-primary' href="#shinsaibashi">心斎橋</a></p>
                    <p class='control'><a class='button tag is-primary' href="#umeda">梅田</a></p>
                    <p class='control'><a class='button tag is-primary' href="#nagoya">名古屋</a></p>
                    <p class='control'><a class='button tag is-primary' href="#sendai">仙台</a></p>
                    <p class='control'><a class='button tag is-primary' href="#kobe">神戸</a></p>
                    <p class='control'><a class='button tag is-primary' href="#hakata">博多</a></p>
                    <p class='control'><a class='button tag is-primary' href="#sapporo">札幌</a></p>
                </div>

                <!-- ランキング -->
                <label class="label is-large" id="ranking"><i class="fas fa-trophy has-text-success"></i> ランキング</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-rounded tag is-info' href="{{ route('ranking') }}#audience_comment_rank"><i class='fas fa-users'></i> お客さんレビューのいいね数 TOP10</a></p>
                    <p class='control'><a class='is-rounded tag is-success' href="{{ route('ranking') }}#player_comment_rank"><i class='fas fa-guitar'></i> 出演者、その他レビューのいいね数 TOP10</a></p>
                </div>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-rounded tag is-warning' href="{{ route('ranking') }}#comment_count_rank"><i class="fas fa-cube"></i> ライブハウスのレビュー件数 TOP10</a></p>
                    <p class='control'><a class='is-rounded tag is-danger' href="{{ route('ranking') }}#livehouse_point_rank"><i class="far fa-star"></i> ライブハウスの評価 TOP10</a></p>
                </div>

                <!-- キャパシティ -->
                <label class="label is-large" id="capacity"><i class="fas fa-users has-text-primary"></i> キャパシティで探す</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-rounded tag is-info' href="?capacity=1#capacity">50人以下</a></p>
                    <p class='control'><a class='is-rounded tag is-primary' href="?capacity=2#capacity">50 〜 99人</a></p>
                    <p class='control'><a class='is-rounded tag is-primary' href="?capacity=3#capacity">100 〜 199人</a></p>
                    <p class='control'><a class='is-rounded tag is-warning' href="?capacity=4#capacity">200 〜 299人</a></p>
                    <p class='control'><a class='is-rounded tag is-warning' href="?capacity=5#capacity">300 〜 499人</a></p>
                    <p class='control'><a class='is-rounded tag is-danger' href="?capacity=6#capacity">500人以上</a></p>
                </div>
                @if ($livehouse_capacity)
                    {{ count($livehouse_capacity) }} 件 / {{ $total_livehouse_count }} 件<br>
                    @foreach($livehouse_capacity as $livehouse)
                        {{ $livehouse->capacity }} 人：{{ $livehouse->region }} <a href='review.php?id={{ $livehouse->id }}'>{{ $livehouse->livehouse_name }}</a><br>
                    @endforeach
                @endif
                <hr>

                <!-- エフェクターレビューサイトバナー -->
                <div class="margin-bottom-ss">
                    <a href="{{ Config::get('const.EFFECTOR_URL') }}" target="_blank">
                        <img src="assets/images/effector_kuchikomi.png" width="700px" class="img-radius" alt="エフェクターレビューサイト作ったんだけど、何か口コミある？">
                    </a>
                </div>

                <!-- キーワード検索 -->
                <div id="search">
                    <div class="field">
                        <label class="label is-large"><i class="fas fa-search blue"></i> キーワードで検索</label>
                        <div class="control">
                            <input v-model="keyword" class="input is-large" type="text" placeholder="ライブハウス名 or 渋谷">
                        </div>
                    </div>
                    <table v-if="keyword">
                        <p v-if="keyword" class="label is-large">検索結果：@{{ filteredLivehouse.length }} / {{ $total_livehouse_count }} 件</p>
                        <tr v-for="livehouse in filteredLivehouse" :key="livehouse">
                            <td>@{{ livehouse.livehouse_region }}：</td>
                            <td><a v-on:click="locationReview(livehouse.livehouse_id)">@{{ livehouse.livehouse_name }}<a></td>
                        </tr>
                    </table>
                </div>
            </section>

            <!-- 北海道・東北 エリア -->
            <section class="section" id="area1">
                <h1 class="title">- 北海道・東北 エリア -</h1>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[1] as $region)
                        <p class='control'><a class='button is-warning tag is-medium is-rounded' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <hr>
                <div class="content">
                    <h4 class="title is-4" id="北海道"> <i class="fas fa-map-marker-alt icon-red"></i> 北海道</h4>
                    <div class="margin-top-city">
                        <strong id="sapporo"> 札幌 </strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("北海道", "札幌") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("北海道") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="青森県"> <i class="fas fa-map-marker-alt icon-red"></i> 青森県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("青森県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="岩手県"> <i class="fas fa-map-marker-alt icon-red"></i> 岩手県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("岩手県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="宮城県"> <i class="fas fa-map-marker-alt icon-red"></i> 宮城県</h4>
                    </div>
                    <div class="margin-top-city">
                        <strong id="sendai">仙台</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("宮城県", "仙台") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("宮城県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="秋田県"> <i class="fas fa-map-marker-alt icon-red"></i> 秋田県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("秋田県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="山形県"> <i class="fas fa-map-marker-alt icon-red"></i> 山形県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("山形県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="福島県"> <i class="fas fa-map-marker-alt icon-red"></i> 福島県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("福島県") }}
                    </div>
                </div>
            </section>

            <!-- 中部 エリア -->
            <section class="section" id="area2">
                <h1 class="title">- 中部 エリア -</h1>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[2] as $region)
                        <p class='control'><a class='button is-warning tag is-medium is-rounded' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <hr>
                <div class="content">
                    <h4 class="title is-4" id="新潟県"> <i class="fas fa-map-marker-alt icon-red"></i> 新潟県</h4>
                    {{ $livehouse_repo->showLivehouseByCity("新潟県") }}
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="富山県"> <i class="fas fa-map-marker-alt icon-red"></i> 富山県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("富山県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="石川県"> <i class="fas fa-map-marker-alt icon-red"></i> 石川県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("石川県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="福井県"> <i class="fas fa-map-marker-alt icon-red"></i> 福井県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("福井県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="山梨県"> <i class="fas fa-map-marker-alt icon-red"></i> 山梨県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("山梨県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="長野県"> <i class="fas fa-map-marker-alt icon-red"></i> 長野県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("長野県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="岐阜県"> <i class="fas fa-map-marker-alt icon-red"></i> 岐阜県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("岐阜県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="静岡県"> <i class="fas fa-map-marker-alt icon-red"></i> 静岡県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("長野県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="愛知県"> <i class="fas fa-map-marker-alt icon-red"></i> 愛知県</h4>
                    </div>
                    <div class="margin-top-city">
                        <strong id="nagoya">名古屋</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("愛知県", "名古屋") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("愛知県") }}
                    </div>
                </div>
            </section>

            <!-- 関東 エリア -->
            <section class="section" id="area3">
                <h1 class="title">- 関東 エリア -</h1>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[3] as $region)
                        <p class='control'><a class='button is-warning tag is-medium is-rounded' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <hr>
                <div class="content">
                    <h4 class="title is-4" id="茨城県"> <i class="fas fa-map-marker-alt icon-red"></i> 茨城県</h4>
                    {{ $livehouse_repo->showLivehouseByCity("茨城県") }}
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="栃木県"> <i class="fas fa-map-marker-alt icon-red"></i> 栃木県</h4>
                    </div>
                    <div class="margin-top-city">
                        <strong id="utsunomiya">宇都宮</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("栃木県", "宇都宮") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("栃木県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="群馬県"> <i class="fas fa-map-marker-alt icon-red"></i> 群馬県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("群馬県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="埼玉県"> <i class="fas fa-map-marker-alt icon-red"></i> 埼玉県</h4>
                    </div>
                    <div class="margin-top-city">
                        <strong id="saitama">さいたま市</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("埼玉県", "さいたま市") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="koshigaya">越谷市</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("埼玉県", "越谷市") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="kawaguchi">川口市</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("埼玉県", "川口市") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="kawagoe">川越市</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("埼玉県", "川越市") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="kumagaya">熊谷市</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("埼玉県", "熊谷市") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("埼玉県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="千葉県"> <i class="fas fa-map-marker-alt icon-red"></i> 千葉県</h4>
                    </div>
                    <div class="margin-top-city">
                        <strong id="kashiwa">柏</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("千葉県", "柏") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("千葉県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="東京都"> <i class="fas fa-map-marker-alt icon-red"></i> 東京都</h4>
                    </div>
                    <div class="field is-grouped tags">
                        <p class='control'><a class='button is-warning tag is-rounded' href='#shibuya'>渋谷</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#shinjuku'>新宿</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#ikebukuro'>池袋</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#shimokitazawa'>下北沢</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#yotsuya'>四谷</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#kouenji'>高円寺</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#okubo'>大久保</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#kichijoji'>吉祥寺</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#roppongi'>六本木</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#akasaka'>赤坂</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#takadanobaba'>高田馬場</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#otsuka'>大塚</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#ginza'>銀座</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#ebisu'>恵比寿</a></p>
                    </div>
                    <div class="field is-grouped tags">
                        <p class='control'><a class='button is-warning tag is-rounded' href='#ogikubo'>荻窪</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#sangenjaya'>三軒茶屋</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#kokubunji'>国分寺</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#tachikawa'>立川</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#hachioji'>八王子</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#aoyama'>青山</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#harajuku'>原宿</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#daikanyama'>代官山</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#nakano'>中野</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#machida'>町田</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#ekoda'>江古田</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#kanda'>神田</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#meguro'>目黒</a></p>
                        <p class='control'><a class='button is-warning tag is-rounded' href='#tokyo_other'>その他</a></p>
                    </div>
                    <div class="margin-top-city">
                        <strong id="shibuya">渋谷</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "渋谷") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="shinjuku">新宿</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "新宿") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="ikebukuro">池袋</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "池袋") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="shimokitazawa">下北沢</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "下北沢") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="yotsuya">四谷</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "四谷") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="kouenji">大久保</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "大久保") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="okubo">高円寺</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "高円寺") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="kichijoji">吉祥寺</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "吉祥寺") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="roppongi">六本木</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "六本木") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="akasaka">赤坂</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "赤坂") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="takadanobaba">高田馬場</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "高田馬場") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="otsuka">大塚</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "大塚") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="ginza">銀座</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "銀座") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="ebisu">恵比寿</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "恵比寿") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="ogikubo">荻窪</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "荻窪") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="sangenjaya">三軒茶屋</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "三軒茶屋") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="kokubunji">国分寺</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "国分寺") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="tachikawa">立川</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "立川") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="hachioji">八王子</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "八王子") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="aoyama">青山</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "青山") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="harajuku">原宿</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "原宿") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="daikanyama">代官山</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "代官山") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="nakano">中野</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "中野") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="machida">町田</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "町田") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="ekoda">江古田</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "江古田") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="kanda">神田</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "神田") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="meguro">目黒</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都", "目黒") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="tokyo_other">その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("東京都") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="神奈川県"> <i class="fas fa-map-marker-alt icon-red"></i> 神奈川県</h4>
                        <strong id="yokohama">横浜</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("神奈川県", "横浜") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("神奈川県") }}
                    </div>
                </div>
            </section>

            <!-- 近畿 エリア -->
            <section class="section" id="area4">
                <h1 class="title">- 近畿 エリア -</h1>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[4] as $region)
                        <p class='control'><a class='button is-warning tag is-medium is-rounded' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <hr>
                <div class="content">
                    <h4 class="title is-4" id="三重県"> <i class="fas fa-map-marker-alt icon-red"></i> 三重県</h4>
                    {{ $livehouse_repo->showLivehouseByCity("三重県") }}
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="滋賀県"> <i class="fas fa-map-marker-alt icon-red"></i> 滋賀県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("滋賀県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="京都府"> <i class="fas fa-map-marker-alt icon-red"></i> 京都府</h4>
                        {{ $livehouse_repo->showLivehouseByCity("京都府") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="大阪府"> <i class="fas fa-map-marker-alt icon-red"></i> 大阪府</h4>
                    </div>
                    <div class="margin-top-city">
                        <strong id="shinsaibashi">心斎橋</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("大阪府", "心斎橋") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="umeda">梅田</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("大阪府", "梅田") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="horie">堀江</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("大阪府", "堀江") }}
                    </div>
                    <div class="margin-top-city">
                        <strong id="osaka_other">その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("大阪府") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="兵庫県"> <i class="fas fa-map-marker-alt icon-red"></i> 兵庫県</h4>
                    </div>
                    <div class="margin-top-city">
                        <strong id="kobe">神戸</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("兵庫県", "神戸") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("兵庫県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="奈良県"> <i class="fas fa-map-marker-alt icon-red"></i> 奈良県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("奈良県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="和歌山県"> <i class="fas fa-map-marker-alt icon-red"></i> 和歌山県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("和歌山県") }}
                    </div>
                </div>
            </section>

            <!-- 中国 エリア -->
            <section class="section" id="area5">
                <h1 class="title">- 中国 エリア -</h1>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[5] as $region)
                        <p class='control'><a class='button is-warning tag is-medium is-rounded' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <hr>
                <div class="content">
                    <h4 class="title is-4" id="鳥取県"> <i class="fas fa-map-marker-alt icon-red"></i> 鳥取県</h4>
                    {{ $livehouse_repo->showLivehouseByCity("鳥取県") }}
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="島根県"> <i class="fas fa-map-marker-alt icon-red"></i> 島根県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("島根県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="岡山県"> <i class="fas fa-map-marker-alt icon-red"></i> 岡山県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("岡山県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="広島県"> <i class="fas fa-map-marker-alt icon-red"></i> 広島県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("広島県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="山口県"> <i class="fas fa-map-marker-alt icon-red"></i> 山口県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("山口県") }}
                    </div>
                </div>
            </section>

            <!-- 四国 エリア -->
            <section class="section" id="area6">
                <h1 class="title">- 四国 エリア -</h1>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[6] as $region)
                        <p class='control'><a class='button is-warning tag is-medium is-rounded' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <hr>
                <div class="content">
                    <h4 class="title is-4" id="徳島県"> <i class="fas fa-map-marker-alt icon-red"></i> 徳島県</h4>
                    {{ $livehouse_repo->showLivehouseByCity("徳島県") }}
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="香川県"> <i class="fas fa-map-marker-alt icon-red"></i> 香川県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("香川県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="愛媛県"> <i class="fas fa-map-marker-alt icon-red"></i> 愛媛県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("愛媛県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="高知県"> <i class="fas fa-map-marker-alt icon-red"></i> 高知県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("高知県") }}
                    </div>
                </div>
            </section>

            <!-- 九州・沖縄 エリア -->
            <section class="section" id="area7">
                <h1 class="title">- 九州・沖縄 エリア -</h1>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[7] as $region)
                        <p class='control'><a class='button is-warning tag is-medium is-rounded' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <hr>
                <div class="content">
                    <h4 class="title is-4" id="福岡県"> <i class="fas fa-map-marker-alt icon-red"></i> 福岡県</h4>
                    <div class="margin-top-city">
                        <strong id="hakata">博多</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("福岡県", "博多") }}
                    </div>
                    <div class="margin-top-city">
                        <strong>その他</strong><br>
                        {{ $livehouse_repo->showLivehouseByCity("福岡県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="佐賀県"> <i class="fas fa-map-marker-alt icon-red"></i> 佐賀県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("佐賀県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="長崎県"> <i class="fas fa-map-marker-alt icon-red"></i> 長崎県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("長崎県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="熊本県"> <i class="fas fa-map-marker-alt icon-red"></i> 熊本県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("熊本県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="大分県"> <i class="fas fa-map-marker-alt icon-red"></i> 大分県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("大分県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="宮崎県"> <i class="fas fa-map-marker-alt icon-red"></i> 宮崎県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("宮崎県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="鹿児島県"> <i class="fas fa-map-marker-alt icon-red"></i> 鹿児島県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("鹿児島県") }}
                    </div>
                    <div class="margin-top-region">
                        <h4 class="title is-4" id="沖縄県"> <i class="fas fa-map-marker-alt icon-red"></i> 沖縄県</h4>
                        {{ $livehouse_repo->showLivehouseByCity("沖縄県") }}
                    </div>
                </div>
                <hr>
            </section>

            <section class="section">
                <!-- エフェクターレビューサイトバナー -->
                <div class="margin-bottom-ss">
                    <a href="{{ Config::get('const.EFFECTOR_URL') }}" target="_blank">
                        <img src="assets/images/effector_kuchikomi.png" width="700px" class="img-radius" alt="エフェクターレビューサイト作ったんだけど、何か口コミある？">
                    </a>
                </div>

                <!-- 地域で検索 -->
                <label class="label is-large"><i class="fas fa-map-marker-alt red"></i> 地域で探す</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area1">北海道・東北</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area2">中部</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area3">関東</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area4">近畿</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area5">中国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area6">四国</a></p>
                    <p class='control'><a class='button is-rounded tag is-medium is-info' href="#area7">九州・沖縄</a></p>
                </div>

                <!-- 人気のエリア -->
                <label class="label is-large"><i class="far fa-star has-text-warning"></i>人気のエリア</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button tag is-primary' href="#shibuya">渋谷</a></p>
                    <p class='control'><a class='button tag is-primary' href="#shinjuku">新宿</a></p>
                    <p class='control'><a class='button tag is-primary' href="#ikebukuro">池袋</a></p>
                    <p class='control'><a class='button tag is-primary' href="#shimokitazawa">下北沢</a></p>
                    <p class='control'><a class='button tag is-primary' href="#kichijoji">吉祥寺</a></p>
                    <p class='control'><a class='button tag is-primary' href="#akasaka">赤坂</a></p>
                    <p class='control'><a class='button tag is-primary' href="#yokohama">横浜</a></p>
                    <p class='control'><a class='button tag is-primary' href="#saitama">さいたま市</a></p>
                </div>
                <div class="field is-grouped tags">
                    <p class='control'><a class='button tag is-primary' href="#shinsaibashi">心斎橋</a></p>
                    <p class='control'><a class='button tag is-primary' href="#umeda">梅田</a></p>
                    <p class='control'><a class='button tag is-primary' href="#nagoya">名古屋</a></p>
                    <p class='control'><a class='button tag is-primary' href="#sendai">仙台</a></p>
                    <p class='control'><a class='button tag is-primary' href="#kobe">神戸</a></p>
                    <p class='control'><a class='button tag is-primary' href="#hakata">博多</a></p>
                    <p class='control'><a class='button tag is-primary' href="#sapporo">札幌</a></p>
                </div>

                <!-- ランキング -->
                <label class="label is-large"><i class="fas fa-trophy has-text-success"></i> ランキング</label>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-rounded tag is-info' href="{{ route('ranking') }}#audience_comment_rank"><i class='fas fa-users'></i> お客さんレビューのいいね数 TOP10</a></p>
                    <p class='control'><a class='is-rounded tag is-success' href="{{ route('ranking') }}#player_comment_rank"><i class='fas fa-guitar'></i> 出演者、その他レビューのいいね数 TOP10</a></p>
                </div>
                <div class="field is-grouped tags">
                    <p class='control'><a class='is-rounded tag is-warning' href="{{ route('ranking') }}#comment_count_rank"><i class="fas fa-cube"></i> ライブハウスのレビュー件数 TOP10</a></p>
                    <p class='control'><a class='is-rounded tag is-danger' href="{{ route('ranking') }}#livehouse_point_rank"><i class="far fa-star"></i> ライブハウスの評価 TOP10</a></p>
                </div>

                <!-- 都道府県リスト -->
                <label class="label is-large" id="regionlist"><i class="fas fa-map-marker-alt icon-red"></i>  都道府県一覧 </label>
                <label class="label is-large">-北海道・東北-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[1] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-中部-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[2] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-関東-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[3] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-近畿-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[4] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-中国-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[5] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-四国-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[6] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
                <label class="label is-large">-九州・沖縄-</label>
                <div class="field is-grouped tags">
                    @foreach(Config::get('const.REGION_BY_AREA')[7] as $region)
                        <p class='control'><a class='button tag is-medium is-warning' href='#{{ $region }}'>{{ $region }}</a></p>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

    <!-- SNS -->
    <section class="section">
        <div class="sns">
            <h4 class="label is-large">- Share on SNS -</h4>
            <a href="http://twitter.com/share?url={{ Config::get('const.LIVEHOUSE_URL') }}"><i class="fab fa-twitter twitter-link"></i></a>
            <a href="http://line.me/R/msg/text/?{{ Config::get('const.LIVEHOUSE_URL') }}"><i class="fab fa-line line-link"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ Config::get('const.LIVEHOUSE_URL') }}"><i class="fab fa-facebook facebook-link"></i></a>
        </div>
    </section>

    <p id="page-top"><a href="#"><i class="fas fa-arrow-circle-up"></i> TOP</a></p>

    @include('footer')

    <!-- リアルタイム検索 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
    <script>
        new Vue({
            el: '#search',
            data: {
                keyword: '',
                livehouse_list: [
                    @foreach($livehouses as $livehouse)
                        {
                            id: '{{ $loop->iteration }}',
                            livehouse_id: '{{ $livehouse->id }}',
                            livehouse_address: '{{ $livehouse->address }}',
                            livehouse_region: '{{ $livehouse->region }}',
                            livehouse_keyword: '{{ $livehouse->keyword }}',
                            livehouse_name: '{{ $livehouse->livehouse_name }}'
                        },
                    @endforeach
                ]
            },
            computed: {
                filteredLivehouse: function() {
                    var livehouse_list = [];
                    for(var i in this.livehouse_list) {
                        var livehouse = this.livehouse_list[i];
                        if (livehouse.livehouse_name.indexOf(this.keyword) !== -1 ||
                            livehouse.livehouse_name.toLowerCase().indexOf(this.keyword) !== -1 ||
                            livehouse.livehouse_keyword.indexOf(this.keyword) !== -1 ||
                            livehouse.livehouse_address.indexOf(this.keyword) !== -1
                        ) {
                            livehouse_list.push(livehouse);
                        }
                    }
                    return livehouse_list;
                }
            },
            methods: {
                locationReview: function(id) {
                    location.href = "review.php?id=" + id
                }
            },
        });
    </script>

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

    <!-- TO TOP -->
    <script>
        $(function() {
            var topBtn = $('#page-top');
            topBtn.hide();
            //スクロールが100に達したらボタン表示
            $(window).scroll(function () {
                if ($(this).scrollTop() > 800) {
                    topBtn.fadeIn();
                } else {
                    topBtn.fadeOut();
                }
            });
            //スクロールしてトップ
            topBtn.click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 100);
                return false;
            });
        });
    </script>
@endsection