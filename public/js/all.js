$(document).ready(function() {

  // アイコンをhoverした時
  $('.icon').hover(
    function() {
      $(this).find('.hover-menu').addClass('open');
    },
    function() {
      $(this).find('.hover-menu').removeClass('open');
    }
  )

  // 削除モーダル 表示
  $('#trash').click(function() {
    $('#delete-modal').fadeIn();
  });

  // 削除モーダル 閉じる
  $('.close-modal').click(function() {
    $('#delete-modal').fadeOut();
  });

});