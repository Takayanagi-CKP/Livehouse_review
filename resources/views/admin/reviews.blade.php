@extends('admin/layout')
@section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="far fa-comment text-success"></i> レビュー管理画面</h3>
                <p>
                    投稿件数 <span class="lead">{{ $total_review_count }}</span> 件<br>
                    <i class="fas fa-user"></i> お客さん：{{ $total_review_count_audience }}件　
                    <i class='fas fa-guitar'></i> 出演者：{{ $total_review_count_player }}件　
                    <i class='fas fa-cube'></i> その他：{{ $total_review_count_other }}件
                </p>

                <!-- 検索フォーム -->
                <form method="get" action="../admin/reviews" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" value="{{ $keyword }}" placeholder="ユーザー名 or コメント">
                    </div>
                    <input type="submit" value="検索" class="btn btn-Primary">
                </form>
            </div>
        </div>
        <p>{{ $reviews->count() }} 件 / {{ $reviews->total() }} 件</p>
        <hr>

        <!-- レビュー一覧 -->
        <small>
            @foreach($reviews as $review)
                ID : {{ $review->id }}<br>
                <i class='fas fa-cube'></i> {{ $review->livehouse->region }} / <a href="{{ route('review') }}/?id={{ $review->livehouse->id }}" target="_blank">{{ $review->livehouse->livehouse_name }}</a><br>
                <i class="fas fa-user"></i> {{ $review->user_name }} / {{ Config::get('const.USER_TYPE')[$review->user_type] }}のレビュー<br>
                評価：<span class="text-warning">{!! \App\Enums\CommonStatus::getStarIcon($review->points) !!}</span> {{ $review->points }}<br>
                「{{ $review->title }}」<br>
                <i class="far fa-comment"></i> {!! nl2br(e($review->comments)) !!}<br>
                <i class="fas fa-heart text-danger"></i> {{ $review->comments_like }}　投稿日：{{ $review->regist_date->format('Y-m-d') }}
                <form method="post" action="/admin/review_destroy/{{ $review->id }}">
                    <a href="/admin/review_edit/{{ $review->id }}" class="btn btn-Primary btn-sm">編集</a>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="削除" class="btn btn-danger btn-sm" onClick='return CheckDelete()'>
                </form>
                <hr>
            @endforeach
        </small>

        <!-- ページネーション -->
        <div class="col">
            {!! $reviews->appends(['keyword' => $keyword])->render() !!}
        </div>
    </div>

    <script>
        function CheckDelete() {
            return confirm("本当に削除してもよろしいですか？");
        }
    </script>
@endsection