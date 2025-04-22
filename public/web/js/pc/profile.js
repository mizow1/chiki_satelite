/*-----------------------------------------------------------------------------------*/
/*	紹介ページ
/*-----------------------------------------------------------------------------------*/
var ow_profile = 0;
var ow_sample = 0;
var ow_profile_top_wrap=0;
var ow_about_star_bg = 0;
var ow_sample_image = 0;
var ow_rec_intro = 0;

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

    // ow_profile_top_wrap
    if($('.ow_profile_top_wrap').length){
    var ow_profile_top_wrap_pos = $('.ow_profile_top_wrap').offset().top;
    }
    // ow_about
    if ($('.ow_about_star_bg').length) {
      var ow_about_star_bg_pos = $('.ow_about_star_bg').offset().top;
    }
    // ow_sample_image
    if($('.ow_sample_image').length){
      var ow_sample_image_pos = $('.ow_sample_image').offset().top;
    }
    // ow_rec_intro
    if ($('.ow_rec_intro').length) {
      var ow_rec_intro_pos = $('.ow_rec_intro').offset().top;
    }

    $(window).scroll(function(){
      var topPos = $(window).scrollTop();

      // ow_profile_top_wrap
        if(topPos + w_height> ow_profile_top_wrap_pos && ow_profile_top_wrap == 0){
          $(function(){
            $('.ow_profile_teller').fadeIn(1000);
            $('.ow_profile_name').delay(800).fadeIn(1500);
            $('.ow_profile_setumei').delay(1200).fadeIn(1500);
            $('.ow_profile_decoration_1').delay(1200).fadeIn(1500);
            $('.ow_profile_decoration_2').delay(1400).fadeIn(1500);
          });
          ow_profile_top_wrap = 1;
        }

        // ow_about
        if (topPos + w_height > ow_about_star_bg_pos && ow_about_star_bg == 0) {
          $(function(){
          $('.ow_about_star_text').fadeIn(1000);
          $('.ow_about_star_graph').delay(500).fadeIn(2000);
          $('.ow_about_star_graph_2').delay(1000).fadeIn(1500);
          $('.ow_about_star_graph_3').delay(1300).fadeIn(1800);
          });
          ow_about_star_bg = 1;
        }
      // ow_sample_image
      if (topPos + w_height > ow_sample_image_pos && ow_sample_image == 0) {
        $(function(){
        $('.ow_sample_image_hand').delay(800).fadeIn(1000);
        $('.ow_sample_image_text').delay(1200).fadeIn(1000);
        $('.ow_sample_image_text_2').delay(1400).fadeIn(1000);
        });
        ow_sample_image = 1;
      }

        // ow_rec_intro
        if (topPos + w_height > ow_rec_intro_pos && ow_rec_intro == 0) {
          $(function(){
            $('.ow_rec_intro_title').fadeIn(800);
            $('.ow_rec_intro_text').delay(1100).fadeIn(1000);
            $('.ow_rec_intro_text_3').delay(1300).fadeIn(1000);
            $('.ow_rec_intro_text_2').delay(1500).fadeIn(1000);
            $('.ow_rec_intro_text_4').delay(1700).fadeIn(1000);
            $('.ow_rec_intro_title_2').delay(2000).fadeIn(1000);
          });
          ow_rec_intro_pos = 1;
        }

  });
});