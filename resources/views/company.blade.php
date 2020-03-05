@extends('layout')
@section('content')
    <section class="section">
        <h3 class="title is-2 has-text-centered">会社概要</h3>
        <div class="field is-grouped is-grouped-centered">
            <table class="table">
                <tr>
                    <th>社名</th>
                    <td>株式会社チューントラスト（英: Tunetrust inc.）</td>
                </tr>
                <tr>
                    <th>本社所在地</th>
                    <td>〒107-0062 東京都港区南青山2丁目2番15号　ウィン青山942</td>
                </tr>
                <tr>
                    <th>設立</th>
                    <td>2014年 10月2日</td>
                </tr>
                <tr>
                    <th>代表者</th>
                    <td>代表取締役社長　高柳 トモヤ</td>
                </tr>
                <tr>
                    <th>事業内容</th>
                    <td>
                        チケット、楽曲、グッズ等の販売<br>
                        スマートフォンアプリケーションの開発、配信及び販売<br>
                        インターネットを利用した広告業及び広告代理店業<br>
                        各種ライブ、イベントの企画及び運営
                    </td>
                </tr>
                <tr>
                    <th>取得特許</th>
                    <td>コンテンツ配信システム(投げ銭連動型広告)　特許第5902768号</td>
                </tr>
                <tr>
                    <th>連絡先</th>
                    <td><a href="mailto:info@kuchikomiaru.com">info@kuchikomiaru.com</a></td>
                </tr>
            </table>
        </div>
    </section>

    @include('footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/animation.js"></script>

@endsection