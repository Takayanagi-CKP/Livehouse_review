/* スマホメニュー開閉 */
$(function () {
  $('.side__item-first')
    // マウスポインターが画像に乗った時の動作
    .mouseover(function (e) {
      $('.triangle').addClass('triangle-hover');
    })
    // マウスポインターが画像から外れた時の動作
    .mouseout(function (e) {
      $('.triangle').removeClass('triangle-hover');
    });
});



/* フッター画像 */
$(function () {
  $('.footer__pic-item')
    // マウスポインターが画像に乗った時の動作
    .mouseover(function (e) {
      $(this).addClass('footer__pic-item-hover');
    })
    // マウスポインターが画像から外れた時の動作
    .mouseout(function (e) {
      $(this).removeClass('footer__pic-item-hover');
    });
});



/* トップへ移動 */
$(function () {
  $('.page-top').click(function () {
    $("html,body").animate({ scrollTop: 0 }, "300");
  })
})


/* トップへ移動 */
$(function () {
  $('.header__menu-btn').click(function () {
    $(this).toggleClass('active');
    $(".menu-trigger").toggleClass('active');
    $('.header__main-menu').toggleClass('active');
  })
})




// $(function () {
//   // 星の大きさ変更＆クリックイベント取得
//   $("#rateYo1").rateYo({
//     starWidth: "20px",
//   })
//     .on("rateyo.set", function (e, data) {
//       alert("The rating is set to " + data.rating + "!");
//     }
//     );
//   // 色変更
//   $("#rateYo2").rateYo({
//     ratedFill: "#ffc600",
//     rateing: 2.5,
//     halfStar: true
//   });
//   // 星の数を変更
//   $("#rateYo3").rateYo({
//     numStars: 10
//   });
//   $("#rateYo2").rateYo({
//     rateing: 2.5,
//     halfStar: true
//   });
// });



/* もっと読む */
// $(document).ready(function () {
//   $('.comment-kuchikomi-text').collapser({
//     mode: 'chars',
//     truncate: 25,
//     showText: '続きを読む',
//     hideText: '閉じる'
//   });
// });



/* detailページ（口コミ・地図切り替え） */
$(function () {
  $('.detail-btn__comment').click(function () {
    $('.detail-tab__map').css('display', 'none');
    $('.detail-tab__comment').css('display', 'block');
    $(this).addClass('detail-link-click');
    $('.detail-btn__map').removeClass('detail-link-click');
  })
  $('.detail-btn__map').click(function () {
    $('.detail-tab__comment').css('display', 'none');
    $('.detail-tab__map').css('display', 'block');
    $(this).addClass('detail-link-click');
    $('.detail-btn__comment').removeClass('detail-link-click');
  })
})
