/*-----------------------------------------------------------------------------------*/
/*	入力ページ
/*-----------------------------------------------------------------------------------*/
var ow_sample_intro = 0;

$(window).load(function(){

  var w_height = $(window).height();

  // header
  $('.ow_header_teller').fadeIn(1500);
  $('.ow_header_title').delay(800).fadeIn(1500);
  $('.ow_header_decoration_2').delay(1200).fadeIn(1500);
  $('.ow_header_decoration_1').delay(1600).fadeIn(1500);
  $('.ow_header_decoration_3').delay(2200).fadeIn(1500);

// position
// --------------------------------------------------------------------

    // ow_sample_intro
    if ($('.ow_sample_intro').length) {
      var ow_sample_intro_pos = $('.ow_sample_intro').offset().top;
    }

    $(window).scroll(function(){
      var topPos = $(window).scrollTop();

      //ow_sample_intro
      if (topPos + w_height > ow_sample_intro_pos && ow_sample_intro == 0) {
        $(function(){
        $('.ow_sample_intro_text').fadeIn(1500);
        $('.ow_sample_intro_confetti').delay(800).fadeIn(1500);
        $('.ow_sample_intro_title_1').delay(800).fadeIn(1500);
        $('.ow_sample_intro_title_2').delay(900).fadeIn(1500);
        $('.ow_sample_intro_hikari').delay(2100).fadeIn(1500);
        });
          ow_sample_intro = 1;
      }
  });
});
