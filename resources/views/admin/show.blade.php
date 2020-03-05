@extends('admin/layout')
@section('content')
    <h1 class="text-center">{{ $livehouse->livehouse_name }}</h1>
    <div class="text-center">
        <a href="{{ $livehouse->livehouse_url }}" target="_blank">
            <img src="http://capture.heartrails.com/huge?{{ $livehouse->livehouse_url }}" width="320px">
        </a>
    </div>

    <div class="container ops-main">
        <div class="row">
            <div class="col-sm-12">
                <a href="../livehouses" class="btn btn-primary">一覧に戻る</a>
                <a href="../edit/{{ $livehouse->id }}" class="btn btn-success">編集</a>
            </div>
        </div>

        <!-- table -->
        <table class="table table-striped mt-5 mb-5">
            <tr>
                <td>ID</td>
                <td>{{ $livehouse->id }}</td>
            </tr>
            <tr>
                <td>ライブハウス名</td>
                <td>{{ $livehouse->livehouse_name }}</td>
            </tr>
            <tr>
                <td>ライブハウス名（省略）</td>
                <td>{{ $livehouse->livehouse_short_name }}</td>
            </tr>
            <tr>
                <td>評価</td>
                <td>{{ $livehouse->average_points }}</td>
            </tr>
            <tr>
                <td>詳細</td>
                <td>{!! nl2br(e($livehouse->livehouse_detail)) !!}</td>
            </tr>
            <tr>
                <td>公式サイトURL</td>
                <td>{{ $livehouse->livehouse_url }}</td>
            </tr>
            <tr>
                <td>キャパシティ</td>
                <td>{{ $livehouse->capacity }}</td>
            </tr>
            <tr>
                <td>ジャンル</td>
                <td>{{ $livehouse->genre }}</td>
            </tr>
            <tr>
                <td>エリア</td>
                <td>{{ Config::get('const.AREA')[$livehouse->area] }}（{{ $livehouse->area }}）</td>
            </tr>
            <tr>
                <td>都道府県</td>
                <td>{{ $livehouse->region }}</td>
            </tr>
            <tr>
                <td>都市</td>
                <td>{{ $livehouse->city }}</td>
            </tr>
            <tr>
                <td>住所</td>
                <td>{{ $livehouse->address }}</td>
            </tr>
            <tr>
                <td>タグ1</td>
                <td>{{ $livehouse->tag1 }}</td>
            </tr>
            <tr>
                <td>タグ2</td>
                <td>{{ $livehouse->tag2 }}</td>
            </tr>
            <tr>
                <td>タグ3</td>
                <td>{{ $livehouse->tag3 }}</td>
            </tr>
            <tr>
                <td>いいね数</td>
                <td>{{ $livehouse->livehouse_like }}</td>
            </tr>
            <tr>
                <td>レビュー数（出演者）</td>
                <td>{{ $livehouse->review_count }}（{{ $livehouse->player_review_count }}）</td>
            </tr>
            <tr>
                <td>キーワード</td>
                <td>{{ $livehouse->keyword }}</td>
            </tr>
        </table>
    </div>
@endsection