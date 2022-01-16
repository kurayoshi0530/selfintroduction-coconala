/*
--------------------------------------------------
アイコンをクリックするとメニューが大きく表示される
--------------------------------------------------
*/
$(function() {
    let $body = $('body');

    //メニューボタンクリックでクラスを追加
    $('#btn-menu').on('click', function() {
        $body.toggleClass('open-menu');
    });

    //メニュー以外部分をクリックで閉じる
    $('#sp-menu').on('click', function() {
        $body.removeClass('open-menu');
    });
});

/*
--------------------------------------------------
aboutのキャラアイコンがフェードインで表示される
--------------------------------------------------
*/
$(function() {
    $('.character-icon').hide().fadeIn(2000);
});


/*
--------------------------------------------------
SERVICEとWORKSアニメーション実装
--------------------------------------------------
*/
//ウィンドウの高さを取得する
var window_h = $(window).height();

//スクロールイベント
$(window).on("scroll", function() {

    //スクロールの位置を取得する
    var scroll_top = $(window).scrollTop();

    $(".ser-content, .work-img").each(function() {
        //各box要素のtopの位置を取得する
        var elem_pos = $(this).offset().top;
        //どのタイミングでフェードインさせるか
        if (scroll_top >= elem_pos - window_h + 50) {
            $(this).addClass("fadein"); //特定の位置を超えたらクラスを追加
        } else {
            $(this).removeClass("fadein"); //そうでない場合はクラスを削除
        }
    });
});