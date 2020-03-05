<!-- footer -->
<footer class="footer">
    <div class="footer__inner">
        <a href="" class="footer__logo">
            <picture>
                <source media="(min-width:768px)" srcset="assets/images/img-logo-footer.png">
                <source media="(max-width:767px)" srcset="assets/images/img-logo-footer.png">
                <img src="assets/images/img-logo-footer.png" alt="ライブハウスレビューサイト作ったんだけど、何か口コミある？">
            </picture>
        </a>
        <div class="footer__main">
            <div class="footer__left">
                <div class="footer__block">
                    <p class="footer__title">SITE MAP</p>
                    <ul class="footer__list">
                        <li><a href="{{ route('livehouse_list') }}#regionlist" class="footer__item">都道府県一覧</a></li>
                        <li><a href="{{ route('ranking') }}#comment_rank" class="footer__item">ランキング</a></li>
                        <li><a href="{{ route('livehouse_list') }}#search" class="footer__item">ライブハウス検索</a></li>
                    </ul>
                </div>
                <div class="footer__block">
                    <p class="footer__title">ABOUT</p>
                    <ul class="footer__list">
                        <li><a href="{{ Config::get('const.EFFECTOR_URL') }}" class="footer__item" target="_blank">エフェクターレビュー</a></li>
                        <li><a href="company" class="footer__item">運営会社</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer__center">
                <div class="footer__block">
                    <p class="footer__title">TWITTER FEED</p>
                    <a href="{{ Config::get('const.TWITTER_URL') }}" class="twitter-timeline" data-link-color="#1abc9c" data-chrome="transparent nofooter noheader" width="400px" height="230px"></a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
            <div class="footer__right">
                <div class="footer__block">
                    <ul class="footer__pic-list">
                        <li>
                            <a href="https://px.a8.net/svt/ejp?a8mat=3592F4+54KEB6+2TI6+609HT" target="_blank" rel="nofollow">
                                <img border="0" width="100%" height="250" src="https://www22.a8.net/svt/bgt?aid=190219648310&wid=001&eno=01&mid=s00000013155001009000&mc=1">
                            </a>
                            <img src="https://www11.a8.net/0.gif?a8mat=3592F4+54KEB6+2TI6+609HT">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p class="margin-top">Copyright © {{ \Carbon\Carbon::now()->format("Y") }} Tunetrust Corporation. All rights reserved</p>
</footer>