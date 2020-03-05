@extends('admin/layout')
@section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3><i class='fas fa-cube text-secondary'></i> ライブハウス管理画面</h3>
                <p><i class="far fa-comment text-success"></i> 投稿件数 <span class="lead">{{ $total_review_count }}</span> 件</p>
                <!-- 検索フォーム -->
                <form method="get" action="../admin/livehouses" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" value="{{ $keyword }}" placeholder="下北沢">
                    </div>
                    <input type="submit" value="検索" class="btn btn-Primary">
                </form>
                <!-- 地域選択 -->
                <i class="fas fa-map-marker-alt"></i> 地域ごとの表示：
                <a href="livehouses">全国</a>　
                <a href="livehouses?area=1">北海道・東北</a>　
                <a href="livehouses?area=2">中部</a>　
                <a href="livehouses?area=3">関東</a>　
                <a href="livehouses?area=4">近畿</a>　
                <a href="livehouses?area=5">中国</a>　
                <a href="livehouses?area=6">四国</a>　
                <a href="livehouses?area=7">九州</a>　
                <a href="/admin/create" class="btn btn-success"><i class="fas fa-edit"></i> 新規登録</a>
                <hr>
                <p>{{ $livehouses->count() }} / {{ $livehouses->total() }} 件</p>
            </div>
        </div>
        <!-- ライブハウス一覧 -->
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>都道府県</th>
                <th>ライブハウス名</th>
                <th>住所</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            @foreach($livehouses as $livehouse)
                <tr>
                    <td>{{ $livehouse->id }}</td>
                    <td>{{ $livehouse->region }}</td>
                    <td>
                        <a href="/admin/show/{{ $livehouse->id }}">{{ $livehouse->livehouse_name }}</a>
                        <small>{{ $livehouse->review_count }}件</small>
                    </td>
                    <td><small>{{ $livehouse->address }}</small></td>
                    <td><a href="/admin/edit/{{ $livehouse->id }}" class="btn btn-primary btn-sm">編集</a></td>
                    <td>
                        <form method="post" action="/admin/destroy/{{ $livehouse->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="削除" class="btn btn-danger btn-sm" onClick='return CheckDelete()'>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <!-- ページネーション -->
        <div class="col">
            {!! $livehouses->appends(['keyword' => $keyword])->appends(['area' => $area_id])->render() !!}
        </div>
    </div>

    <script>
        function CheckDelete() {
            return confirm("本当に削除してもよろしいですか？");
        }
    </script>
@endsection