@extends('admin/layout')
@section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-6">
                <h2>レビュー編集</h2>
            </div>
        </div>
        <a href="../../admin/reviews"><button type="submit" class="btn btn-success">戻る</button></a>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                @include('admin/message')
                <form method="post" action="/admin/review_update/{{ $review->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>ユーザー名</label>
                        <input type="text" class="form-control" name="user_name" value="{{ $review->user_name }}" placeholder="名無しさん">
                    </div>
                    <div class="form-group">
                        <label>ユーザータイプ</label>
                        <select name="user_type" class="custom-select">
                            <option value="0" {{ $review->user_type == 0 ? 'selected' : '' }} >お客さんのレビュー</option>
                            <option value="1" {{ $review->user_type == 1 ? 'selected' : '' }} >出演者のレビュー</option>
                            <option value="2" {{ $review->user_type == 2 ? 'selected' : '' }} >その他（関係者など）</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>タイトル</label>
                        <input type="text" class="form-control" name="title" value="{{ $review->title }}" placeholder="スタッフが親切♪">
                    </div>
                    <div class="form-group">
                        <label>評価</label>
                        <input type="text" class="form-control" name="points" value="{{ $review->points }}" placeholder="5">
                    </div>
                    <div class="form-group">
                        <label>コメント</label>
                        <textarea
                            rows="10"
                            cols="60"
                            class="form-control"
                            name="comments"
                            placeholder="是非また行きたいと思いました！"
                        >{{ $review->comments }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>いいね</label>
                        <input type="text" class="form-control" name="comments_like" value="{{ $review->comments_like }}" placeholder="0">
                    </div>
                    <button type="submit" class="btn btn-primary">編集する</button>
                </form>
            </div>
        </div>
    </div>
@endsection