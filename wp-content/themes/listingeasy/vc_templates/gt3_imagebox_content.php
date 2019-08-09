<?php
	include_once get_template_directory() . '/vc_templates/gt3_google_fonts_render.php';
	$theme_color = esc_attr(gt3_option("theme-custom-color"));
	$defaults = array(
		'box_image' => '',
		'icon_type' => '',
		'icon_fontawesome' => '',
		'thumbnail' => '',
		'image_position' => 'left',
		'number' => '',
		'content_bg' => '#ffffff',
		'circle_bg' => $theme_color,
		'heading' => '',
		'text' => '',
		'url' => '',
		'url_text' => '',
		'new_tab' => '',
		'icon_size' => '',
		'custom_icon_size' => '50',
		'icon_color' => '',
		'title_tag' => '',
		'title_color' => '',
		'link_color' => '',
		'link_hover_color' => '',
 		'module_title_size' => '30',
		'module_content_size' => '16',
		'text_color' => '',
		'animation_class' => ''
	);
	$atts = vc_shortcode_attribute_parse($defaults, $atts);
	extract($atts);

	$compile = '';

	$featured_image_url = '';

	if (!empty($box_image)) {
		$img_id = preg_replace( '/[^\d]/', '', $box_image );
		$featured_image = wp_get_attachment_image_src($img_id, 'single-post-thumbnail');
		if (strlen($featured_image[0]) > 0) {
			$featured_image_url = $featured_image[0];
		} else {
			$featured_image_url = "";
		}
	}

	$module_img = '';
	if (strlen($featured_image_url)) {
		$module_img = '<div class="gt3_imagebox_content_img"><div class="gt3_module_wrap"><img src="' . aq_resize($featured_image_url, '630', '', true, true, true) . '" alt="" /></div></div>';
		$img_position = 'image_position_'.$image_position;
	} else {
		$img_position = '';
	}

	// Content Background Color
	if ($content_bg != '' && $content_bg != '#ffffff') {
		$content_bg_color = 'style="background: '.esc_attr($content_bg).'" ';
	} else {
		$content_bg_color = '';
	}

	// Number Background Color
	if ($circle_bg != '' && $circle_bg != $theme_color) {
		$circle_bg_color = 'style="background: '.esc_attr($circle_bg).'" ';
	} else {
		$circle_bg_color = '';
	}

	$blank = $new_tab == 'true' ? ' target="_blank"' : '';

	$icon = '';
	if ($icon_type == 'font' && !empty($icon_fontawesome)) {
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
		$icon_style = $icon_size == 'custom' ? 'font-size:'.esc_attr($custom_icon_size).'px' : '';
		$icon = '<i class="gt3_imagebox_content_icon '.esc_attr($icon_fontawesome).'" style="color:'.esc_attr($icon_color).'; '.esc_attr($icon_style).'"></i>';
	}

	if ($icon_type == 'image' && !empty($thumbnail)) {
		$icon_style = $icon_size == 'custom' ? ' style="width:'.esc_attr($custom_icon_size).'px; font-size:'.esc_attr($custom_icon_size).'px"' : '';
		$thumbnail = !empty($thumbnail) ? wp_get_attachment_image( $thumbnail , 'full') : '';
		$icon = '<i class="gt3_imagebox_content_icon" '.$icon_style.'>'.$thumbnail.'</i>';
	}

	// Render Google Fonts
	$obj = new GoogleFontsRender();
	extract( $obj->getAttributes( $atts, $this, $this->shortcode, array('google_fonts_module_title', 'google_fonts_module_content') ) );

	if ( ! empty( $styles_google_fonts_module_title ) ) {
		$module_title_font = '' . esc_attr( $styles_google_fonts_module_title ) . ';';
	} else {
		$module_title_font = '';
	}

	if ( ! empty( $styles_google_fonts_module_content ) ) {
		$module_content_font = '' . esc_attr( $styles_google_fonts_module_content ) . ';';
	} else {
		$module_content_font = '';
	}

	// Font Size of Title
	if ($module_title_size != '') {
		$module_title_line = $module_title_size * 1.333;
		$module_title_css = 'font-size: ' . $module_title_size . 'px; line-height: ' . $module_title_line . 'px; ';
	} else {
		$module_title_css = ' ';
	}

	// Font Size of Content
	if ($module_content_size != '') {
		$module_content_line = $module_content_size * 1.875;
		$module_content_css = 'font-size: ' . $module_content_size . 'px; line-height: ' . $module_content_line . 'px; ';
	} else {
		$module_content_css = ' ';
	}

	// Animation
	if (! empty($atts['css_animation'])) {
		$animation_class = $this->getCSSAnimation( $atts['css_animation'] );
	} else {
		$animation_class = '';
	}

	if (!empty($heading)) {
		$heading_cont = '<div class="gt3_icon_box__title"><'.esc_html($title_tag).' style="color:'.esc_attr($title_color).';'. esc_attr($module_title_font) . esc_attr($module_title_css) .'">';
			$heading_cont .= !empty($url) ? '<a href="'.esc_url($url).'"'.$blank.'>' : '';
				$heading_cont .= esc_html($heading);
			$heading_cont .= !empty($url) ? '</a>' : '';
		$heading_cont .= '</'.esc_html($title_tag).'></div>';

	}else{
		$heading_cont = '';
	}

	if (!empty($text) || !empty($heading_cont) || !empty($url_text)) {
		$custom_icon_size = $icon_size == 'custom' ? $custom_icon_size + 25 : '';
		$content = '<div class="gt3_iconbox-content-wrapper">';
			$content .= $heading_cont;
			$content .= !empty($text) ?'<div class="gt3_icon_box__text" style="color:'.esc_attr($text_color).';'.esc_attr($module_content_font) . esc_attr($module_content_css).'">'.$text.'</div>' : '';
			$content .= !empty($url_text) ?'<div class="gt3_icon_box__link" style="color:'.(!empty($link_hover_color) ? esc_attr($link_hover_color) : esc_attr($title_color)) .'; '.esc_attr($module_content_font).'">'.(!empty($url) ? '<a class="learn_more" href="'.esc_url($url).'" style="color:'.esc_attr($link_color) .'; '.esc_attr($module_content_css).'"'.$blank.'>'.esc_html($url_text).' <i class="fa fa-angle-right"></i></a>' : '').'</div>' : '';
		$content .= '</div>';
	}else{
		$content .= '';
	}

	$module_class = '';
	$module_class .= ' '.$img_position;
	$module_class .= ' gt3_icon_box__icon_icon_size_'.$icon_size;
	$module_class .= ' '.$animation_class;

	$compile .= '<div class="gt3_imagebox_content '.esc_attr($module_class).'">';
		if ($image_position == 'left') {
			$compile .= $module_img;
		}
		$compile .= '
		<div class="gt3_imagebox_content_info">
			<div class="gt3_module_wrap">
				<div class="gt3_module_inner" ' . $content_bg_color . '>';
					$compile .= $content . $icon .'
				</div>
			</div>
		</div>';
		if ($image_position == 'right') {
			$compile .= $module_img;
		}
		if ($number !== '') {
			$compile .= '<div class="gt3_imagebox_content_number" ' . $circle_bg_color . '>'.esc_attr($number).'</div>';
		}
	$compile .= '</div>';
	
	echo  $compile;
?>  
