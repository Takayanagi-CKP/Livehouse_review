@extends('admin/layout')
@section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-6">
                <h2>ライブハウス編集</h2>
            </div>
        </div>
        <a href="../../admin/livehouses"><button type="submit" class="btn btn-success">戻る</button></a>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                @include('admin/message')
                <form method="post" action="/admin/update/{{ $livehouse->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>ライブハウス名</label>
                        <input type="text" class="form-control" name="livehouse_name" value="{{ $livehouse->livehouse_name }}" placeholder="北浦和Ayers">
                    </div>
                    <div class="form-group">
                        <label>ライブハウス名(省略)</label>
                        <input type="text" class="form-control" name="livehouse_short_name" value="{{ $livehouse->livehouse_short_name }}" placeholder="Ayers">
                    </div>
                    <div class="form-group">
                        <label>説明</label>
                        <textarea
                            rows="10"
                            cols="60"
                            class="form-control"
                            name="livehouse_detail"
                            placeholder="今年20周年の老舗ライブハウスＪＲ北浦和駅・西口から徒歩２分のアットホームな空間"
                        >{{ $livehouse->livehouse_detail }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>ジャンル</label>
                        <input type="text" class="form-control" name="genre" value="{{ $livehouse->genre }}" placeholder="オールジャンル">
                    </div>
                    <div class="form-group">
                        <label>キャパシティ</label>
                        <input type="text" class="form-control" name="capacity" value="{{ $livehouse->capacity }}" placeholder="100">
                    </div>
                    <div class="form-group">
                        <label>エリア</label>
                        <select name="area" class="custom-select">
                            @foreach(Config::get('const.AREA') as $area)
                                <option value="{{ $loop->iteration }}" {{ $livehouse->area == $loop->iteration ? 'selected' : '' }} >{{ $area }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>都道府県</label>
                        {{--<input type="text" class="form-control" name="region" value="{{ $livehouse->region }}" placeholder="東京都">--}}
                        <select name="region" class="custom-select">
                            @foreach(Config::get('const.REGION') as $region)
                                <option value="{{ $region }}" {{ $region == $livehouse->region ? 'selected' : '' }}>{{ $region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>都市</label>
                        <input type="text" class="form-control" name="city" value="{{ $livehouse->city }}" placeholder="渋谷">
                    </div>
                    <div class="form-group">
                        <label>住所</label>
                        <input type="text" class="form-control" name="address" value="{{ $livehouse->address }}" placeholder="埼玉県さいたま市浦和区常盤9-31-17 荘司ビルＢ１">
                    </div>
                    <div class="form-group">
                        <label>公式サイトURL</label>
                        <input type="text" class="form-control" name="livehouse_url" value="{{ $livehouse->livehouse_url }}" placeholder="https://">
                    </div>
                    <div class="form-group">
                        <label>タグ1</label>
                        <input type="text" class="form-control" name="tag1" value="{{ $livehouse->tag1 }}" placeholder="駅近">
                        <label>タグ2</label>
                        <input type="text" class="form-control" name="tag2" value="{{ $livehouse->tag2 }}" placeholder="駅近">
                        <label>タグ3</label>
                        <input type="text" class="form-control" name="tag3" value="{{ $livehouse->tag3 }}" placeholder="駅近">
                    </div>
                    <div class="form-group">
                        <label>キーワード（カンマ区切り）</label>
                        <input type="text" class="form-control" name="keyword" value="{{ $livehouse->keyword }}" placeholder="エアーズ,えあーず,ayers,AYERS">
                    </div>
                    <button type="submit" class="btn btn-primary">編集する</button>
                </form>
            </div>
        </div>
    </div>
@endsection