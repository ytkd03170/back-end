$(function(){ //DOM構築後に実行される
  var modal = $('#modal'),
  //カンマ区切りで var をつなげられる(4回書いてもいい)  
      modalContent = $('#modal_content'),
      btnOpen = $("#btn_open"),
      btnClose = $(".btn_close");
 
  $(btnOpen).on('click', function () {
//$(btnOpen).click(function(){ と同じ  
    modal.show();//見えるようになる
  });
 
  $(modal).on('click', function (event) {
    // eventはクリックのこと
    if (!($(event.target).closest(modalContent).length)
    || ($(event.target).closest(btnClose).length)) {
  //長さがfalseではない = 要素がある
  // !(1 + 1) !(1 + 0) !(0 + 1) !(0 + 0)←これだけtrue 
      modal.hide();
    }
  });

  console.log(true == 1);
});