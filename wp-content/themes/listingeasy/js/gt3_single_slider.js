"use strict";
var gt3_sslider = jQuery('.gt3_single_slider'),
	gt3_sslider_thumb = jQuery('.gt3_single_thmb'),
	gt3_sslider_thumbs_wrapper = jQuery('.gt3_single_slider_thumbs_wrapper'),
	gt3_sslider_slide = jQuery('.gt3_single_slide'),
	gt3_sslider_thumbs = jQuery('.gt3_single_slider_thumbs'),
	rtl = jQuery(body).hasClass('rtl');

jQuery(document).ready(function(){
	single_slider_setup();
	gt3_sslider_thumb.on('click', function(){
		set_sSlide(jQuery(this).attr('data-count'));
	});
	jQuery('.gt3_single_slider_prev_btn').on('click', function(){
		sSlider_prev_slide();
	});
	jQuery('.gt3_single_slider_next_btn').on('click', function(){
		sSlider_next_slide();
	});
});

jQuery(document.documentElement).keyup(function (event) {
	if ((event.keyCode == 37)) {
		event.preventDefault();
	}
	if ((event.keyCode == 39)) {
		event.preventDefault();
	}

	if ((event.keyCode == 37)) {
		event.preventDefault();
		sSlider_prev_slide();
	}
	if ((event.keyCode == 39)) {
		event.preventDefault();
		sSlider_next_slide();
	}
});

jQuery(window).load(function(){
	single_slider_setup();
});

jQuery(window).resize(function(){
	single_slider_setup();
});

function sSlider_prev_slide() {
	var cur_slide = parseInt(gt3_sslider.find('.current_slide').attr('data-count')),
		max_slide = gt3_sslider.find('.gt3_single_slide').size();
	cur_slide--;
	
	if (cur_slide > max_slide) cur_slide = 1;
	if (cur_slide < 1) cur_slide = max_slide;	
	set_sSlide(cur_slide);
}

function sSlider_next_slide() {
	var cur_slide = parseInt(gt3_sslider.find('.current_slide').attr('data-count')),
		max_slide = gt3_sslider.find('.gt3_single_slide').size();
	cur_slide++;
	
	if (cur_slide > max_slide) cur_slide = 1;
	if (cur_slide < 1) cur_slide = max_slide;
	set_sSlide(cur_slide);
}

function single_slider_setup() {
	var set_height = gt3_sslider.width()*gt3_sslider.attr('data-ratio');
	gt3_sslider.height(set_height);
	
	//thumbs setup
	var set_thumbs_width = (gt3_sslider.width()+30)/4 - parseInt(gt3_sslider_thumb.css('margin-left')) - parseInt(gt3_sslider_thumb.css('margin-right')),
		set_thumbs_height = set_thumbs_width*gt3_sslider_thumb.attr('data-ratio');
	
	gt3_sslider_thumb.width(set_thumbs_width).height(set_thumbs_height);
	gt3_sslider_thumbs.height(set_thumbs_height);
	
	if (gt3_sslider.find('.current_slide').size() < 1) {
		set_sSlide(1);
	}
}

function set_sSlide(slide_num) {
	var slide_num = parseInt(slide_num),
		max_slide = gt3_sslider.find('.gt3_single_slide').size();

	gt3_sslider.find('.prev_sslide').removeClass('prev_sslide');
	gt3_sslider.find('.current_slide').removeClass('current_slide');
	gt3_sslider.find('.next_sslide').removeClass('next_sslide');
	gt3_sslider_thumbs.find('.current_sthmb').removeClass('current_sthmb');

	if((parseInt(slide_num)+1) > max_slide) {
		var nextSlide = gt3_sslider.find('.gt3_single_slide1');
	} else if ((parseInt(slide_num)+1) == max_slide){
		var nextSlide = gt3_sslider.find('.gt3_single_slide'+max_slide);
	} else {
		var nextSlide = gt3_sslider.find('.gt3_single_slide'+(parseInt(slide_num)+1));
	}
	
	if((parseInt(slide_num)-1) < 1) {
		var prevSlide = gt3_sslider.find('.gt3_single_slide'+max_slide);
	} else if ((slide_num-1) == 1){
		var prevSlide = gt3_sslider.find('.gt3_single_slide1');
	} else {
		var prevSlide = gt3_sslider.find('.gt3_single_slide'+(parseInt(slide_num)-1));
	}

	var curSlide = gt3_sslider.find('.gt3_single_slide'+slide_num);
	var curThmb = gt3_sslider_thumbs.find('.gt3_single_thmb'+slide_num);

	prevSlide.addClass('prev_sslide');	
	curSlide.addClass('current_slide');
	nextSlide.addClass('next_sslide');
	curThmb.addClass('current_sthmb');
	var current_offset = curThmb.offset().left - gt3_sslider_thumbs_wrapper.offset().left,
		check_offset = gt3_sslider_thumbs_wrapper.width(),
		thmb_width = curThmb.width() + parseInt(gt3_sslider_thumb.css('margin-right'))*2,
		thmbs_width = thmb_width * gt3_sslider_thumb.size(),
		items_in_view = 4;

	if (rtl == true) {
		if (current_offset > check_offset) {
			var set_left = -1 * thmb_width * curThmb.attr('data-count') + thmb_width;
		} else if (current_offset < 0) {
			var set_left = -1 * ((curThmb.attr('data-count') - items_in_view)*thmb_width);
		}
		gt3_sslider_thumbs.css('right', set_left+'px');
	} else {
		if (current_offset > check_offset) {
			var set_left = -1 * ((curThmb.attr('data-count') - items_in_view)*thmb_width);
		} else if (current_offset < 0) {
			var set_left = -1 * thmb_width * curThmb.attr('data-count') + thmb_width;
		}
		gt3_sslider_thumbs.css('left', set_left+'px');
	}

}