@extends('admin/layout')
@section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="far fa-chart-bar text-danger"></i> ランキング</h3>
                <div class="row">
                    <div class="col-6">
                        <p>
                            <i class='fas fa-cube text-secondary'></i> ライブハウス 登録数 <span class="lead">{{ $total_livehouse_count }}</span> 件　<br>
                            <i class="far fa-comment text-success"></i> <a href="#livehouse_like">レビュー件数 TOP30</a>　
                            <i class="fas fa-heart text-danger"></i> <a href="#review_count">いいね TOP30 </a>　
                            <i class="far fa-star text-warning"></i> <a href="#livehouse_average">評価 TOP30</a>
                        </p>
                    </div>
                    <div class="col-6">
                        <p>
                            <i class="far fa-comment text-success"></i> レビュー 投稿件数 <span class="lead">{{ $total_review_count }}</span> 件<br>
                            <i class="fas fa-users text-info"></i> <a href="#audience_review_like">お客さんのいいね TOP30 </a>　
                            <i class="fas fa-guitar text-warning"></i> <a href="#player_review_like">出演者、その他のいいね TOP30 </a>　
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-6" id="review_count">
                        <h4><i class='fas fa-cube text-secondary'></i> ライブハウスのレビュー件数 TOP 30</h4>
                        <table class="table table-striped">
                            <tr>
                                <th>順位</th>
                                <th>レビュー数</th>
                                <th>ライブハウス名</th>
                            </tr>
                            @foreach($ranking_review_count as $livehouse)
                                <tr>
                                    <th>
                                        @if ($loop->iteration <= 3)
                                            <i class="fas fa-trophy text-warning"></i>
                                        @endif
                                        {{ $loop->iteration }} 位
                                    </th>
                                    <td><i class="far fa-comment text-success"></i> <span class="lead">{{ $livehouse->review_count }}</span></td>
                                    <td>
                                        {{ $livehouse->region }} /
                                        <a href="/admin/show/{{ $livehouse->id }}">{{ $livehouse->livehouse_name }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-6" id="livehouse_like">
                        <h4><i class='fas fa-cube text-secondary'></i> ライブハウスのいいね数 TOP 30</h4>
                        <table class="table table-striped">
                            <tr>
                                <th>順位</th>
                                <th>いいね数</th>
                                <th>ライブハウス名</th>
                            </tr>
                            @foreach($ranking_livehouse_like as $livehouse)
                                <tr>
                                    <th>
                                        @if ($loop->iteration <= 3)
                                            <i class="fas fa-trophy text-warning"></i>
                                        @endif
                                        {{ $loop->iteration }} 位
                                    </th>
                                    <td><i class="fas fa-heart text-danger"></i> <span class="lead">{{ $livehouse->livehouse_like }}</span></td>
                                    <td>
                                        {{ $livehouse->region }} /
                                        <a href="/admin/show/{{ $livehouse->id }}">{{ $livehouse->livehouse_name }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-12 mt-5" id="livehouse_average">
                        <h4><i class='fas fa-cube text-secondary'></i> ライブハウスの平均評価 TOP 30</h4>
                        <table class="table table-striped">
                            <tr>
                                <th>順位</th>
                                <th>評価</th>
                                <th>ライブハウス名</th>
                            </tr>
                            @foreach($ranking_average_points as $livehouse)
                                <tr>
                                    <th>
                                        @if ($loop->iteration <= 3)
                                            <i class="fas fa-trophy text-warning"></i>
                                        @endif
                                        {{ $loop->iteration }} 位
                                    </th>
                                    <td>
                                        <span class="text-warning">{!! \App\Enums\CommonStatus::getStarIcon($livehouse->average_points) !!}</span> <span class="lead">{{ $livehouse->average_points }}</span>
                                    </td>
                                    <td>
                                        {{ $livehouse->region }} /
                                        <a href="/admin/show/{{ $livehouse->id }}">{{ $livehouse->livehouse_name }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col" id="audience_review_like">
                        <h4><i class="far fa-comment text-success"></i> お客さんレビューのいいね数 TOP 30</h4>
                        <hr>
                        <!-- レビュー一覧 -->
                        @foreach($ranking_audience_comments_like as $review)
                            @if ($loop->iteration <= 3)
                                <i class="fas fa-trophy text-warning"></i>
                            @endif
                            {{ $loop->iteration }} 位 <i class="fas fa-heart text-danger"></i> {{ $review->comments_like }}<br>
                            <small>
                                ID : {{ $review->id }}<br>
                                <i class='fas fa-cube'></i> {{ $review->livehouse->region }} /
                                <a href="../review/?id={{ $review->livehouse->id }}" target="_blank">{{ $review->livehouse->livehouse_name }}</a><br>
                                <i class="fas fa-user"></i> {{ $review->user_name }}<br>
                                評価：<span class="text-warning">{!! \App\Enums\CommonStatus::getStarIcon($review->points) !!}</span> {{ $review->points }}<br>
                                「{{ $review->title }}」<br>
                                <i class="far fa-comment"></i> {!! nl2br(e($review->comments)) !!}<br>
                                投稿日：{{ $review->regist_date->format('Y-m-d') }}
                            </small>
                            <hr>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col" id="player_review_like">
                                <h4><i class="far fa-comment text-success"></i> 出演者、その他レビューのいいね数 TOP 30</h4>
                                <hr>
                                <!-- レビュー一覧 -->
                                @foreach($ranking_player_comments_like as $review)
                                    @if ($loop->iteration <= 3)
                                        <i class="fas fa-trophy text-warning"></i>
                                    @endif
                                    {{ $loop->iteration }} 位 <i class="fas fa-heart text-danger"></i> {{ $review->comments_like }}<br>
                                    <small>
                                        ID : {{ $review->id }}<br>
                                        <i class='fas fa-cube'></i> {{ $review->livehouse->region }} /
                                        <a href="../review/?id={{ $review->livehouse->id }}" target="_blank">{{ $review->livehouse->livehouse_name }}</a><br>
                                        <i class="fas fa-user"></i> {{ $review->user_name }} / {{ Config::get('const.USER_TYPE')[$review->user_type] }}のレビュー<br>
                                        評価：<span class="text-warning">{!! \App\Enums\CommonStatus::getStarIcon($review->points) !!}</span> {{ $review->points }}<br>
                                        「{{ $review->title }}」<br>
                                        <i class="far fa-comment"></i> {!! nl2br(e($review->comments)) !!}<br>
                                        投稿日：{{ $review->regist_date->format('Y-m-d') }}
                                    </small>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function CheckDelete() {
            return confirm("本当に削除してもよろしいですか？");
        }
    </script>
@endsection