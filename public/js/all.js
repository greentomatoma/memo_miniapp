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
})