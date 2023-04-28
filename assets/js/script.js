// ページトップボタン
var topBtn = $('.js-pagetop');
topBtn.hide();

// ページトップボタンの表示設定
$(window).scroll(function () {
  if ($(this).scrollTop() > 70) {
    // 指定px以上のスクロールでボタンを表示
    topBtn.fadeIn();
  } else {
    // 画面が指定pxより上ならボタンを非表示
    topBtn.fadeOut();
  }
});

// ページトップボタンをクリックしたらスクロールして上に戻る
topBtn.click(function () {
  $('body,html').animate({
    scrollTop: 0
  }, 300, 'swing');
  return false;
});

//ドロワーメニュー
$("#MenuButton").click(function () {
  // $(".l-drawer-menu").toggleClass("is-show");
  // $(".p-drawer-menu").toggleClass("is-show");
  $(".js-drawer-open").toggleClass("open");
  $(".drawer-menu").toggleClass("open");
  $("html").toggleClass("is-fixed");

});

// スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
// $(document).on('click', 'a[href*="#"]', function () {
//   let time = 400;
//   let header = $('header').innerHeight();
//   let target = $(this.hash);
//   if (!target.length) return;
//   let targetY = target.offset().top - header;
//   $('html,body').animate({ scrollTop: targetY }, time, 'swing');
//   return false;
// });
$(function(){
  var headerHeight = $('header').outerHeight(); // 余白を開けたい場合は + 10を追記する。
  var urlHash = location.hash; // ハッシュ値があればページ内スクロール
  if(urlHash) { // 外部リンクからのクリック時
    $('body,html').stop().scrollTop(0); // スクロールを0に戻す
    setTimeout(function(){ // ロード時の処理を待ち、時間差でスクロール実行
      var target = $(urlHash);
      var position = target.offset().top - headerHeight;
      $('body,html').stop().animate({scrollTop:position}, 500, 'swing'); // スクロール速度ミリ秒
    }, 100);
  }
  $('a[href^="#"]').click(function(){ // 通常のクリック時
    var href= $(this).attr("href"); // ページ内リンク先を取得
    var target = $(href);
    var position = target.offset().top - headerHeight;
    $('body,html').stop().animate({scrollTop:position}, 500, 'swing'); // スクロール速度ミリ秒
    return false; // #付与なし、付与したい場合は、true
  });
});

//ハンバーガーメニュー

$(".js-hamburger").click(function () {
  $(this).toggleClass("--open");
  if($(this).hasClass("--open")){
      $(".js-drawer").fadeIn();
    }else{
      $(".js-drawer").fadeOut();
    }
  });


// ヘッダーMV過ぎたら透過なし
$(function () {
  $(window).on("scroll", function () {
    const sliderHeight = $(".mv").height();
    if (sliderHeight < $(this).scrollTop()) {
      $(".js-header").addClass("opacity1");
    } else {
      $(".js-header").removeClass("opacity1");
    }
  });
});


// メインビジュアルズームイン用Swiper

var slider1 = new Swiper ('.js-mv-swiper', {
  loop: true,
  effect: 'fade',
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
});

// 実績用Swiper

var slider2 = new Swiper ('.js-works-swiper', {
  loop: true,
  effect: 'slide',
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
  },
});

//サムネイル
var slider3Thumbnail = new Swiper('.js-works2-swiper-thumbnail', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    centeredSlides: true,
    loop: true,
    slideToClickedSlide: true,
})

var slider3 = new Swiper ('.js-works2-swiper', {
  loop: true,
  slidesPerView: 1,
  loopedSlides: 5,
  centeredSlides: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
},
  // thumbs: {
  //   swiper: slider2Thumbnail,
  // },
});

slider3.controller.control = slider3Thumbnail;
slider3Thumbnail.controller.control = slider3;