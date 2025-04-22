/*-----------------------------------------------------------------------------------*/
/*	topページ
/*-----------------------------------------------------------------------------------*/
var ow_new_intro = 0;
var ow_sample_intro = 0;
var ow_special_intro = 0;
var ow_explanation_1_bg = 0;
var ow_explanation_2_bg = 0;
var ow_explanation_3_bg = 0;

var ow_category_renai = 0;
var ow_category_deai = 0;
var ow_category_jinsei = 0;

$(window).load(function(){

  var w_height = $(window).height();

  // header
  // $('.ow_header_teller').fadeIn(1500);
  // $('.ow_header_title').delay(800).fadeIn(1000);
  // $('.ow_header_text').delay(1600).fadeIn(1000);
  // $('.ow_header_decoration_2').delay(1600).fadeIn(1500);
  // $('.ow_header_decoration_1').delay(2000).fadeIn(1500);
  // $('.ow_header_decoration_3').delay(2800).fadeIn(1500);

  $('.ow_header_teller').fadeIn(1500);
  $('.ow_header_title').delay(800).fadeIn(1000);
  $('.ow_header_text').delay(1600).fadeIn(1000);
  $('.ow_header_decoration_1_1').delay(1800).fadeIn(1500);
  $('.ow_header_decoration_1_2').delay(1900).fadeIn(1500);
  $('.ow_header_decoration_2_1').delay(2200).fadeIn(1500);
  $('.ow_header_decoration_2_2').delay(2500).fadeIn(1500);
  $('.ow_header_decoration_2_3').delay(2800).fadeIn(4000);

// position
// --------------------------------------------------------------------
    // new_intro
    if ($('.ow_new_intro').length) {
      var ow_new_intro_pos = $('.ow_new_intro').offset().top;
    }

    // ow_sample_intro
    if ($('.ow_sample_intro').length) {
      var ow_sample_intro_pos = $('.ow_sample_intro').offset().top;
    }
    //ow_explanation_bg
    if ($('.ow_explanation_1_bg').length) {
      var ow_explanation_1_bg_pos = $('.ow_explanation_1_bg').offset().top;
    }
    if ($('.ow_explanation_2_bg').length) {
      var ow_explanation_2_bg_pos = $('.ow_explanation_2_bg').offset().top;
    }
    if ($('.ow_explanation_3_bg').length) {
      var ow_explanation_3_bg_pos = $('.ow_explanation_3_bg').offset().top;
    }

    // special_intro
    if ($('.ow_special_intro').length) {
      var ow_special_intro_pos = $('.ow_special_intro').offset().top;
    }

    // category
    if($('.ow_category_renai .ow_category_mid').length){
      var ow_category_renai_pos = $('.ow_category_renai .ow_category_mid').offset().top;
      }
      if($('.ow_category_deai .ow_category_mid').length){
      var ow_category_deai_pos = $('.ow_category_deai .ow_category_mid').offset().top;
      }
      if($('.ow_category_jinsei .ow_category_mid').length){
      var ow_category_jinsei_pos = $('.ow_category_jinsei .ow_category_mid').offset().top;
      }

    $(window).scroll(function(){
      var topPos = $(window).scrollTop();

      //ow_new_intro
      if (topPos + w_height > ow_new_intro_pos && ow_new_intro == 0) {
        $(function(){
        $('.ow_new_intro_title_2').fadeIn(1500);
        $('.ow_new_intro_title_1').delay(800).fadeIn(1500);
        $('.ow_new_intro_text_1').delay(1200).fadeIn(1500);
        $('.ow_new_intro_text_2').delay(1300).fadeIn(1500);
        $('.ow_new_intro_text_3').delay(1700).fadeIn(1500);
        });
        ow_new_intro = 1;
      }

      //ow_sample_intro
      if (topPos + w_height > ow_sample_intro_pos && ow_sample_intro == 0) {
        $(function(){
        $('.ow_sample_intro_text').fadeIn(1500);
        $('.ow_sample_intro_confetti').delay(800).fadeIn(1500);
        $('.ow_sample_intro_title_1').delay(100).fadeIn(1500);
        $('.ow_sample_intro_title_2').delay(1200).fadeIn(1500);
        $('.ow_sample_intro_hikari').delay(2000).fadeIn(1500);
        });
          ow_sample_intro = 1;
      }

        // ow_special_intro
        if (topPos + w_height > ow_special_intro_pos && ow_special_intro == 0) {
          $(function(){
            $('.ow_special_intro_text_1').fadeIn(800);
            $('.ow_special_intro_roulette').delay(1200).fadeIn(1000);
            $('.ow_special_intro_aura').delay(1600).fadeIn(1000);
            $('.ow_special_intro_human').delay(1900).fadeIn(1000);
            $('.ow_special_intro_buttom').delay(2200).fadeIn(1000);
            $('.ow_special_intro_text_2').delay(2600).fadeIn(1000);
            $('.ow_special_intro_tori').delay(2800).fadeIn(1000);
            $('.ow_special_intro_saru').delay(3300).fadeIn(1000);
            $('.ow_special_intro_usagi').delay(3600).fadeIn(1000);

          });
          ow_special_intro_pos = 1;
        }
        // ow_explanation
        if (topPos + w_height > ow_explanation_1_bg_pos && ow_explanation_1_bg == 0) {
          $(function(){
            $('.ow_explanation_1_bg .ow_explanation_number').delay(2600).fadeIn(1000);
            $('.ow_explanation_1_title').delay(3000).fadeIn(1000);
            $('.ow_explanation_1_bg .ow_explanation_text').delay(3600).fadeIn(1000);
            $('.ow_explanation_1_roulette').delay(4000).fadeIn(1000);
          });
          ow_explanation_1_bg_pos = 1;
        }
        if (topPos + w_height > ow_explanation_2_bg_pos && ow_explanation_2_bg == 0) {
          $(function(){
            $('.ow_explanation_2_bg .ow_explanation_number').fadeIn(1000);
            $('.ow_explanation_2_title').delay(800).fadeIn(1000);
            $('.ow_explanation_2_bg .ow_explanation_text').delay(1200).fadeIn(1000);
            $('.ow_explanation_juunisi_1').delay(1500).fadeIn(1000);
            $('.ow_explanation_juunisi_4').delay(1700).fadeIn(1000);
            $('.ow_explanation_juunisi_3').delay(1900).fadeIn(1000);
            $('.ow_explanation_juunisi_2').delay(2300).fadeIn(1000);
          });
          ow_explanation_2_bg_pos = 1;
        }
        if (topPos + w_height > ow_explanation_3_bg_pos && ow_explanation_3_bg == 0) {
          $(function(){
            $('.ow_explanation_3_bg .ow_explanation_number').fadeIn(1000);
            $('.ow_explanation_3_title').delay(800).fadeIn(1000);
            $('.ow_explanation_3_bg .ow_explanation_text').delay(1200).fadeIn(1000);
            $('.ow_explanation_card_1').delay(1500).fadeIn(1000);
            $('.ow_explanation_card_6').delay(1500).fadeIn(1000);
            $('.ow_explanation_card_2').delay(1700).fadeIn(1000);
            $('.ow_explanation_card_5').delay(1700).fadeIn(1000);
            $('.ow_explanation_card_3').delay(1900).fadeIn(1000);
            $('.ow_explanation_card_4').delay(1900).fadeIn(1000);
            $('.ow_explanation_hand').delay(2800).fadeIn(1500);

          });
          ow_explanation_3_bg_pos = 1;
        }

        // category
			if(topPos + w_height> ow_category_renai_pos && ow_category_renai == 0){
				$(function(){
					$('.ow_category_renai .ow_category_title').fadeIn(1000);
				});
				ow_category_renai = 1;
			}
			if(topPos + w_height> ow_category_deai_pos && ow_category_deai == 0){
				$(function(){
					$('.ow_category_deai .ow_category_title').fadeIn(1000);
				});
				ow_category_deai = 1;
			}
			if(topPos + w_height> ow_category_jinsei_pos && ow_category_jinsei == 0){
				$(function(){
					$('.ow_category_jinsei .ow_category_title').fadeIn(1000);
				});
				ow_category_jinsei = 1;
			}
      });
  });
