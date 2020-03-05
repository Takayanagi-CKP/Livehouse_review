@extends('admin/layout')
@section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-6">
                <h2>ライブハウス登録</h2>
            </div>
        </div>
        <a href="../admin/livehouses"><button type="submit" class="btn btn-success">戻る</button></a>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                @include('admin/message')
                <form method="post" action="/admin/store">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>ライブハウス名</label>
                        <input type="text" class="form-control" name="livehouse_name" value="{{ old('livehouse_name') }}" placeholder="北浦和Ayers">
                    </div>
                    <div class="form-group">
                        <label>ライブハウス名(省略)</label>
                        <input type="text" class="form-control" name="livehouse_short_name" value="{{ old('livehouse_short_name') }}" placeholder="Ayers">
                    </div>
                    <div class="form-group">
                        <label>説明</label>
                        <textarea
                            rows="10"
                            cols="60"
                            class="form-control"
                            name="livehouse_detail"
                            placeholder="今年20周年の老舗ライブハウスＪＲ北浦和駅・西口から徒歩２分のアットホームな空間"
                        >{{ old('livehouse_detail') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>ジャンル</label>
                        <input type="text" class="form-control" name="genre" value="{{ old('genre') }}" placeholder="オールジャンル">
                    </div>
                    <div class="form-group">
                        <label>キャパシティ</label>
                        <input type="text" class="form-control" name="capacity" value="{{ old('capacity') }}" placeholder="100">
                    </div>
                    <div class="form-group">
                        <label>エリア</label>
                        <select name="area" class="custom-select">
                            @foreach(Config::get('const.AREA') as $area)
                                <option value="{{ $loop->iteration }}" >{{ $area }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>都道府県</label>
                        <select name="region" class="custom-select">
                            @foreach(Config::get('const.REGION') as $region)
                                <option value="{{ $region }}" {{ $region == "東京都" ? 'selected' : '' }}>{{ $region }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>都市</label>
                        <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="渋谷">
                    </div>
                    <div class="form-group">
                        <label>住所</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="埼玉県さいたま市浦和区常盤9-31-17 荘司ビルＢ１">
                    </div>
                    <div class="form-group">
                        <label>公式サイトURL</label>
                        <input type="text" class="form-control" name="livehouse_url" value="{{ old('livehouse_url') }}" placeholder="https://">
                    </div>
                    <div class="form-group">
                        <label>タグ1</label>
                        <input type="text" class="form-control" name="tag1" value="{{ old('tag1') }}" placeholder="駅近">
                        <label>タグ2</label>
                        <input type="text" class="form-control" name="tag2" value="{{ old('tag2') }}" placeholder="駅近">
                        <label>タグ3</label>
                        <input type="text" class="form-control" name="tag3" value="{{ old('tag3') }}" placeholder="駅近">
                    </div>
                    <div class="form-group">
                        <label>キーワード（カンマ区切り）</label>
                        <input type="text" class="form-control" name="keyword" value="{{ old('keyword') }}" placeholder="エアーズ,えあーず,ayers,AYERS">
                    </div>
                    <button type="submit" class="btn btn-primary">登録</button>
                </form>
            </div>
        </div>
    </div>
@endsection