$(window).scroll(function () {

  var scroll = $(window).scrollTop();

  $('.ow_base').each(function () {
    var ow_base = $(this).offset().top;

    if(scroll >= ow_base - 300) {
      $(this).find('.ow_jutu_graph').addClass('ow_jutu_graph_anime');
      $(this).find('.ow_jutu_gesshi').addClass('ow_jutu_gesshi_anime');
      $(this).find('.ow_jutu_nisshi').addClass('ow_jutu_nisshi_anime');
      $(this).find('.ow_jutu_nesshi').addClass('ow_jutu_nesshi_anime');
    };

    if(scroll >= ow_base + 400) {
      $(this).find('.ow_zodiac_nisshi').addClass('ow_zodiac_nisshi_anime');
      $(this).find('.ow_zodiac_gesshi').addClass('ow_zodiac_gesshi_anime');
      $(this).find('.ow_zodiac_nenshi').addClass('ow_zodiac_nenshi_anime');
      $(this).find('.ow_zodiac_shadow_1').addClass('ow_zodiac_shadow_1_anime');
      $(this).find('.ow_zodiac_shadow_2').addClass('ow_zodiac_shadow_2_anime');
      $(this).find('.ow_zodiac_shadow_3').addClass('ow_zodiac_shadow_3_anime');
    };

    if(scroll >= ow_base + 600) {
      $(this).find('.ow_show_human').addClass('ow_show_human_anime');
      $(this).find('.ow_show_work').addClass('ow_show_work_anime');
      $(this).find('.ow_show_work_text').addClass('ow_show_work_text_anime');
      $(this).find('.ow_show_heart').addClass('ow_show_heart_anime');
      $(this).find('.ow_show_heart_text').addClass('ow_show_heart_text_anime');
      $(this).find('.ow_show_originally').addClass('ow_show_originally_anime');
      $(this).find('.ow_show_originally_text').addClass('ow_show_originally_text_anime');
    };

  });

  $('.ow_result_item').each(function () {
    var ow_result_item = $(this).offset().top;

    if(scroll >= ow_result_item - 200) {
      $(this).find('.ow_card_result').addClass('ow_card_result_anime');
      $(this).find('.ow_card_hand').addClass('ow_card_hand_anime');
      $(this).find('.ow_star_figure_twelve_3').addClass('ow_star_figure_twelve_3_anime');
      $(this).find('.ow_star_figure_ten_2').addClass('ow_star_figure_ten_2_anime');
      $(this).find('.ow_star_figure_ten_4').addClass('ow_star_figure_ten_4_anime');
      $(this).find('.ow_star_figure_ten_5').addClass('ow_star_figure_ten_5_anime');
      $(this).find('.ow_star_figure_ten_6').addClass('ow_star_figure_ten_6_anime');
      $(this).find('.ow_star_figure_twelve_7').addClass('ow_star_figure_twelve_7_anime');
      $(this).find('.ow_star_figure_ten_8').addClass('ow_star_figure_ten_8_anime');
      $(this).find('.ow_star_figure_twelve_9').addClass('ow_star_figure_twelve_9_anime');
      $(this).find('.ow_star_figure_hikari').addClass('ow_star_figure_hikari_anime');
      $(this).find('.ow_figure_result_text').addClass('ow_figure_result_text_anime');
      $(this).find('.ow_tentyuusatu_result').addClass('ow_tentyuusatu_result_anime');
    };

  });

});
