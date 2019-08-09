<?php

#Frontend
if (!function_exists('gt3_css_js_register')) {
    function gt3_css_js_register()
    {
        $wp_upload_dir = wp_upload_dir();

        wp_register_script( 'gt3_theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), false, true);
        $translation_array = array(
		    'gt3_ajaxurl' => esc_url(admin_url('admin-ajax.php'))
		);
		wp_localize_script( 'gt3_theme_js', 'object_name', $translation_array );

        #CSS
        wp_enqueue_style('gt3_default_style', get_bloginfo('stylesheet_url'));
		wp_enqueue_style('gt3_theme_icon', get_template_directory_uri() . '/fonts/theme-font/theme_icon.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
        wp_enqueue_style('gt3_theme', get_template_directory_uri() . '/css/theme.css');
		wp_enqueue_style('gt3_composer', get_template_directory_uri() . '/css/base_composer.css');
		wp_enqueue_style('gt3_responsive', get_template_directory_uri() . '/css/responsive.css');

        #JS
		wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array( 'jquery' ), '1.4.1', true);
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script('gt3_theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-event-swipe', get_template_directory_uri() . '/js/jquery.event.swipe.js', array( 'jquery' ), '1.3.1', true);

    }
}
add_action('wp_enqueue_scripts', 'gt3_css_js_register', 10, 1);

if (!function_exists('gt3_rtl_css_js_register')) {
	function gt3_rtl_css_js_register()
	{
		#RTL Direction
		if (is_rtl()) {
			wp_enqueue_style('gt3_rtl', get_template_directory_uri() . '/css/rtl_gt3.css');
			//wp_enqueue_script('gt3_rtl_js', get_template_directory_uri() . '/js/rtl_gt3.js', array('jquery'), false, true);
		}
	}
}
add_action('wp_enqueue_scripts', 'gt3_rtl_css_js_register', 12, 1);

#Admin
add_action('admin_enqueue_scripts', 'gt3_admin_css_js_register');
function gt3_admin_css_js_register()
{
    $protocol = is_ssl() ? 'https' : 'http';

    #CSS (MAIN)
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style('gt3_admin_css', get_template_directory_uri() . '/core/admin/css/admin.css');
	wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('gt3_admin-colorbox', get_template_directory_uri() . '/core/admin/css/colorbox.css');
	wp_enqueue_style('gt3_selectBox_css', get_template_directory_uri() . '/core/admin/css/jquery.selectBox.css');
	wp_enqueue_style("gt3-vc-backend-style", get_template_directory_uri() . '/core/admin/css/gt3-vc-backend.css');

    #JS (MAIN)
    wp_enqueue_script('gt3_admin_js', get_template_directory_uri() . '/core/admin/js/admin.js', array('jquery'), false, true);
    wp_enqueue_media();
    wp_enqueue_script('jquery-colorbox', get_template_directory_uri() . '/core/admin/js/jquery.colorbox-min.js', array('jquery'), '1.6.3', true);
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_script('jquery-selectBox', get_template_directory_uri() . '/core/admin/js/jquery.selectBox.js', array('jquery'), false, true);

	if (class_exists( 'RWMB_Loader' )) {
		wp_enqueue_script('gt3_metaboxes_js', get_template_directory_uri() . '/core/admin/js/metaboxes.js');
	}
}

function gt3_custom_styles() {
	$custom_css = '';

	// THEME COLOR
	$theme_color = esc_attr(gt3_option("theme-custom-color"));
	$theme_color2 = esc_attr(gt3_option("theme-custom-color2"));
	$theme_color3 = esc_attr(gt3_option("theme-custom-color3"));
	// END THEME COLOR

	// BODY BACKGROUND
	$bg_body = esc_attr(gt3_option('body-background-color'));
	// END BODY BACKGROUND

	// BODY TYPOGRAPHY
	$main_font = gt3_option('main-font');
	if (!empty($main_font)) {
		$content_font_family = esc_attr($main_font['font-family']);
		$content_line_height = esc_attr($main_font['line-height']);
		$content_font_size = esc_attr($main_font['font-size']);
		$content_font_weight = esc_attr($main_font['font-weight']);
		$content_color = esc_attr($main_font['color']);
	}else{
		$content_font_family = '';
		$content_line_height = '';
		$content_font_size = '';
		$content_font_weight = '';
		$content_color = '';
	}
	
	// END BODY TYPOGRAPHY

	// HEADER TYPOGRAPHY
	$header_font = gt3_option('header-font');
	if (!empty($header_font)) {
		$header_font_family = esc_attr($header_font['font-family']);
		$header_font_weight = esc_attr($header_font['font-weight']);
		$header_font_color = esc_attr($header_font['color']);
	}else{
		$header_font_family = '';
		$header_font_weight = '';
		$header_font_color = '';
	}
	
	$h1_font = gt3_option('h1-font');
	if (!empty($h1_font)) {
		$H1_font_family = !empty($h1_font['font-family']) ? esc_attr($h1_font['font-family']) : '';
		$H1_font_weight = !empty($h1_font['font-weight']) ? esc_attr($h1_font['font-weight']) : '';
		$H1_font_line_height = !empty($h1_font['line-height']) ? esc_attr($h1_font['line-height']) : '';
		$H1_font_size = !empty($h1_font['font-size']) ? esc_attr($h1_font['font-size']) : '';
	}else{
		$H1_font_family = '';
		$H1_font_weight = '';
		$H1_font_line_height = '';
		$H1_font_size = '';
	}
	
	$h2_font = gt3_option('h2-font');
	if (!empty($h2_font)) {
		$H2_font_family = !empty($h2_font['font-family']) ? esc_attr($h2_font['font-family']) : '';
		$H2_font_weight = !empty($h2_font['font-weight']) ? esc_attr($h2_font['font-weight']) : '';
		$H2_font_line_height = !empty($h2_font['line-height']) ? esc_attr($h2_font['line-height']) : '';
		$H2_font_size = !empty($h2_font['font-size']) ? esc_attr($h2_font['font-size']) : '';
	}else{
		$H2_font_family = '';
		$H2_font_weight = '';
		$H2_font_line_height = '';
		$H2_font_size = '';
	}

	$h3_font = gt3_option('h3-font');
	if (!empty($h3_font)) {
		$H3_font_family = !empty($h3_font['font-family']) ? esc_attr($h3_font['font-family']) : '';
		$H3_font_weight = !empty($h3_font['font-weight']) ? esc_attr($h3_font['font-weight']) : '';
		$H3_font_line_height = !empty($h3_font['line-height']) ? esc_attr($h3_font['line-height']) : '';
		$H3_font_size = !empty($h3_font['font-size']) ? esc_attr($h3_font['font-size']) : '';
	}else{
		$H3_font_family = '';
		$H3_font_weight = '';
		$H3_font_line_height = '';
		$H3_font_size = '';
	}
	
	$h4_font = gt3_option('h4-font');
	if (!empty($h4_font)) {
		$H4_font_family = !empty($h4_font['font-family']) ? esc_attr($h4_font['font-family']) : '';
		$H4_font_weight = !empty($h4_font['font-weight']) ? esc_attr($h4_font['font-weight']) : '';
		$H4_font_line_height = !empty($h4_font['line-height']) ? esc_attr($h4_font['line-height']) : '';
		$H4_font_size = !empty($h4_font['font-size']) ? esc_attr($h4_font['font-size']) : '';
	}else{
		$H4_font_family = '';
		$H4_font_weight = '';
		$H4_font_line_height = '';
		$H4_font_size = '';
	}

	$h5_font = gt3_option('h5-font');
	if (!empty($h5_font)) {
		$H5_font_family = !empty($h5_font['font-family']) ? esc_attr($h5_font['font-family']) : '';
		$H5_font_weight = !empty($h5_font['font-weight']) ? esc_attr($h5_font['font-weight']) : '';
		$H5_font_line_height = !empty($h5_font['line-height']) ? esc_attr($h5_font['line-height']) : '';
		$H5_font_size = !empty($h5_font['font-size']) ? esc_attr($h5_font['font-size']) : '';
	}else{
		$H5_font_family = '';
		$H5_font_weight = '';
		$H5_font_line_height = '';
		$H5_font_size = '';
	}

	$h6_font = gt3_option('h6-font');
	if (!empty($h6_font)) {
		$H6_font_family = !empty($h6_font['font-family']) ? esc_attr($h6_font['font-family']) : '';
		$H6_font_weight = !empty($h6_font['font-weight']) ? esc_attr($h6_font['font-weight']) : '';
		$H6_font_line_height = !empty($h6_font['line-height']) ? esc_attr($h6_font['line-height']) : '';
		$H6_font_size = !empty($h6_font['font-size']) ? esc_attr($h6_font['font-size']) : '';
	}else{
		$H6_font_family = '';
		$H6_font_weight = '';
		$H6_font_line_height = '';
		$H6_font_size = '';
	}

	$menu_font = gt3_option('menu-font');
	if (!empty($menu_font)) {
		$menu_font_family = !empty($menu_font['font-family']) ? esc_attr($menu_font['font-family']) : '';
		$menu_font_weight = !empty($menu_font['font-weight']) ? esc_attr($menu_font['font-weight']) : '';
		$menu_font_line_height = !empty($menu_font['line-height']) ? esc_attr($menu_font['line-height']) : '';
		$menu_font_size = !empty($menu_font['font-size']) ? esc_attr($menu_font['font-size']) : '';
	}else{
		$menu_font_family = '';
		$menu_font_weight = '';
		$menu_font_line_height = '';
		$menu_font_size = '';
	}

	$sub_menu_bg = gt3_option('sub_menu_background');
	$sub_menu_color = gt3_option('sub_menu_color');


	/* GT3 Header Builder */
	$side_top_background = gt3_option('side_top_background');
	$side_top_background = $side_top_background['rgba'];
	$side_top_color = gt3_option('side_top_color');
	$side_top_color_hover = gt3_option('side_top_color_hover');
	$side_top_height = gt3_option('side_top_height');
	$side_top_height = $side_top_height['height'];

	$side_middle_background = gt3_option('side_middle_background');
	$side_middle_background = $side_middle_background['rgba'];
	$side_middle_color = gt3_option('side_middle_color');
	$side_middle_color_hover = gt3_option('side_middle_color_hover');
	$side_middle_height = gt3_option('side_middle_height');
	$side_middle_height = $side_middle_height['height'];

	$side_bottom_background = gt3_option('side_bottom_background');
	$side_bottom_background = $side_bottom_background['rgba'];
	$side_bottom_color = gt3_option('side_bottom_color');
	$side_bottom_color_hover = gt3_option('side_bottom_color_hover');
	$side_bottom_height = gt3_option('side_bottom_height');
	$side_bottom_height = $side_bottom_height['height'];

	$side_top_border = (bool)gt3_option("side_top_border");
	$side_top_border_color = gt3_option("side_top_border_color");

	$side_middle_border = (bool)gt3_option("side_middle_border");
	$side_middle_border_color = gt3_option("side_middle_border_color");
    
    $side_bottom_border = (bool)gt3_option("side_bottom_border");
    $side_bottom_border_color = gt3_option("side_bottom_border_color");

    $header_sticky = gt3_option("header_sticky");
    $side_top_sticky = gt3_option('side_top_sticky');
	$side_top_background_sticky = gt3_option('side_top_background_sticky');
	$side_top_color_sticky = gt3_option('side_top_color_sticky');
	$side_top_color_hover_sticky = gt3_option('side_top_color_hover_sticky');
	$side_top_height_sticky = gt3_option('side_top_height_sticky');

	$side_middle_sticky = gt3_option('side_middle_sticky');
	$side_middle_background_sticky = gt3_option('side_middle_background_sticky');
	$side_middle_color_sticky = gt3_option('side_middle_color_sticky');
	$side_middle_color_hover_sticky = gt3_option('side_middle_color_hover_sticky');
	$side_middle_height_sticky = gt3_option('side_middle_height_sticky');

	$side_bottom_sticky = gt3_option('side_bottom_sticky');
	$side_bottom_background_sticky = gt3_option('side_bottom_background_sticky');
	$side_bottom_color_sticky = gt3_option('side_bottom_color_sticky');
	$side_bottom_color_hover_sticky = gt3_option('side_bottom_color_hover_sticky');
	$side_bottom_height_sticky = gt3_option('side_bottom_height_sticky');

	/* End GT3 Header Builder */

	// END HEADER TYPOGRAPHY

	$custom_css = '
    /* Custom CSS */
    *{
	}
	
	body,
	body.wpb-js-composer .vc_row .vc_tta.vc_general .vc_tta-panel-title>a span,
	body.wpb-js-composer .vc_row .vc_toggle_title>h4,
	.main_footer .widget-title,
	.widget-title,
	.team_title__text,
	.team_title__text > a,
	.woocommerce ul.products li.product h3 {
		font-family:' . $content_font_family . ';
	}
	body {
		'.(!empty($bg_body) ? 'background:'.$bg_body.';' : '').'
		font-size:'.$content_font_size.';
		line-height:'.$content_line_height.';
		font-weight:'.$content_font_weight.';
		color: '.$content_color.';
	}
	.gt3_header_builder_component.gt3_header_builder_text_component {
		font-size:'.$content_font_size.';
		line-height:'.$content_line_height.';
	}
	.woocommerce-Reviews #respond form#commentform{
		font-size:'.$content_font_size.';
		line-height:'.$content_line_height.';
	}
	input[type="date"],
	input[type="email"],
	input[type="number"],
	input[type="password"],
	input[type="search"],
	input[type="tel"],
	input[type="text"],
	input[type="url"],
	select,
	textarea,
	.main_wrapper .chosen-container-multi .chosen-choices li.search-field input[type="text"],
	.main_wrapper .job-manager-form fieldset .wp-editor-container textarea.wp-editor-area {
		font-weight:'.$content_font_weight.';
		font-family:' . $content_font_family . ';
	}
	input[type="reset"],
	input[type="submit"],
	button,
	.gt3_social_color_wrapper .wp-picker-input-wrap .wp-picker-clear{
		font-family:' . $content_font_family . ';
	}

	/* Custom Fonts */
	.module_team .team_info,
	.module_testimonial .testimonials-text,
	h1, h1 span, h1 a,
	h2, h2 span, h2 a,
	h3, h3 span, h3 a,
	h4, h4 span, h4 a,
	h5, h5 span, h5 a,
	h6, h6 span, h6 a,
	.widget.widget_archive > ul > li, 
	.widget.widget_categories > ul > li, 
	.widget.widget_pages > ul > li, 
	.widget.widget_meta > ul > li, 
	.widget.widget_recent_comments > ul > li, 
	.widget.widget_recent_entries > ul > li, 
	.widget.widget_nav_menu > .menu-main-menu-container > ul > li,
	.calendar_wrap tbody,
	body.wpb-js-composer .vc_tta.vc_general .vc_tta-tab,
	.price_item-cost,
	.widget.widget_posts .recent_posts .post_title a,
	.job-manager-form label,
	.job-manager-form legend,
	#job-manager-job-dashboard th,
	#job-manager-job-dashboard tbody td:before,
	#job-manager-review-moderate-board th,
	#job-manager-review-moderate-board tbody td:before,
	.job-manager-form fieldset .job-manager-uploaded-files .job-manager-uploaded-file 
	.job-manager-uploaded-file-preview a.job-manager-remove-uploaded-file:hover,
	dl.gt3_dl dt,
	.package__content b,
	.package__content strong,
	.price_item_body .items_text ul li b,
	.price_item_body .items_text ul li strong,
	.post_media_link,
	.gt3_quote_author,
	.prev_next_links a,
	.gt3_widget.job_manager ul.job_listings li.job_listing a .position,
	.top_footer .listing_widget_wrapper .widget-title,
	.top_footer .working_time_widget .widget-title,
	.top_footer .widget_featured_jobs .widget-title,
	.top_footer .widget_recent_jobs .widget-title {
		color: '.$header_font_color.';
	}
	.dropcap,
	.gt3_icon_box__icon--number,
	.module_testimonial .testimonials-text,
	h1, h1 span, h1 a,
	h2, h2 span, h2 a,
	h3, h3 span, h3 a,
	h4, h4 span, h4 a,
	h5, h5 span, h5 a,
	h6, h6 span, h6 a,
	.strip_template .strip-item a span,
	.column1 .item_title a,
	.index_number,
	.price_item_btn a,
	.shortcode_tab_item_title,
	.gt3_twitter .twitt_title, .category-icon,
	.job-manager-form label,
	#job-manager-job-dashboard th,
	#job-manager-job-dashboard tbody td:before,
	#job-manager-review-moderate-board th,
	#job-manager-review-moderate-board tbody td:before,
	dl.gt3_dl dt,
	.gt3_widget.job_manager ul.job_listings li.job_listing a .position {
		font-family: ' . $header_font_family . ';
		font-weight: ' . $header_font_weight . '
	}
	h1, h1 a, h1 span {
		'.(!empty($H1_font_family) ? 'font-family:'.$H1_font_family.';' : '' ).'
		'.(!empty($H1_font_weight) ? 'font-weight:'.$H1_font_weight.';' : '' ).'
		'.(!empty($H1_font_size) ? 'font-size:'.$H1_font_size.';' : '' ).'
		'.(!empty($H1_font_line_height) ? 'line-height:'.$H1_font_line_height.';' : '' ).'
	}
	h2, h2 a, h2 span,
	h1.blogpost_title, h1.blogpost_title a, h1.blogpost_title span {
		'.(!empty($H2_font_family) ? 'font-family:'.$H2_font_family.';' : '' ).'
		'.(!empty($H2_font_weight) ? 'font-weight:'.$H2_font_weight.';' : '' ).'
		'.(!empty($H2_font_size) ? 'font-size:'.$H2_font_size.';' : '' ).'
		'.(!empty($H2_font_line_height) ? 'line-height:'.$H2_font_line_height.';' : '' ).'
	}
	h3, h3 a, h3 span,
	#customer_login h2,
	.gt3_header_builder__login-modal_container h2,
	.sidepanel .title,
	.gt3_dashboard_user_info .gt3_login__user_name,
	.gt3_header_builder__login-modal .gt3_header_builder__login-modal_container h2{
		'.(!empty($H3_font_family) ? 'font-family:'.$H3_font_family.';' : '' ).'
		'.(!empty($H3_font_weight) ? 'font-weight:'.$H3_font_weight.';' : '' ).'
		'.(!empty($H3_font_size) ? 'font-size:'.$H3_font_size.';' : '' ).'
		'.(!empty($H3_font_line_height) ? 'line-height:'.$H3_font_line_height.';' : '' ).'
	}
	h4, h4 a, h4 span,
	.job-manager-form label,
	.job-manager-form legend,
	#job-manager-job-dashboard th,
	#job-manager-job-dashboard tbody td:before,
	#job-manager-review-moderate-board th,
	#job-manager-review-moderate-board tbody td:before,
	dl.gt3_dl dt,
	.gt3_widget.job_manager ul.job_listings li.job_listing a .position {
		'.(!empty($H4_font_family) ? 'font-family:'.$H4_font_family.';' : '' ).'
		'.(!empty($H4_font_weight) ? 'font-weight:'.$H4_font_weight.';' : '' ). '
		'.(!empty($H4_font_size) ? 'font-size:'.$H4_font_size.';' : '' ).'
		'.(!empty($H4_font_line_height) ? 'line-height:'.$H4_font_line_height.';' : '' ).'
	}
	h5, h5 a, h5 span {
		'.(!empty($H5_font_family) ? 'font-family:'.$H5_font_family.';' : '' ).'
		'.(!empty($H5_font_weight) ? 'font-weight:'.$H5_font_weight.';' : '' ).'
		'.(!empty($H5_font_size) ? 'font-size:'.$H5_font_size.';' : '' ).'
		'.(!empty($H5_font_line_height) ? 'line-height:'.$H5_font_line_height.';' : '' ).'
	}
	h6, h6 a, h6 span {
		'.(!empty($H6_font_family) ? 'font-family:'.$H6_font_family.';' : '' ).'
		'.(!empty($H6_font_weight) ? 'font-weight:'.$H6_font_weight.';' : '' ).'
		'.(!empty($H6_font_size) ? 'font-size:'.$H6_font_size.';' : '' ).'
		'.(!empty($H6_font_line_height) ? 'line-height:'.$H6_font_line_height.';' : '' ).'
	}

	.gt3_module_title_section h5 {
		font-weight:'.$content_font_weight.';
		color: '.$content_color.';
	}
	
	/* Theme color */
	.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover, 
	.woocommerce #reviews #respond input#submit:hover, 
	.woocommerce #reviews a.button:hover, 
	.woocommerce #reviews button.button:hover, 
	.woocommerce #reviews input.button:hover, 
	body.woocommerce a.button:hover, 
	.woocommerce #respond input#submit:hover, 
	.woocommerce button.button, 
	.woocommerce input.button:hover,
	blockquote:before,
	a,
	.top_footer a:hover,
	.widget.widget_archive ul li:hover:before,
	.widget.widget_categories ul li:hover:before,
	.widget.widget_pages ul li:hover:before,
	.widget.widget_meta ul li:hover:before,
	.widget.widget_recent_comments ul li:hover:before,
	.widget.widget_recent_entries ul li:hover:before,
	.widget.widget_nav_menu ul li:hover:before,
	.widget.widget_archive ul li:hover > a,
	.widget.widget_categories ul li:hover > a,
	.widget.widget_pages ul li:hover > a,
	.widget.widget_meta ul li:hover > a,
	.widget.widget_recent_comments ul li:hover > a,
	.widget.widget_recent_entries ul li:hover > a,
	.widget.widget_nav_menu ul li:hover > a,
	.top_footer .widget.widget_archive ul li > a:hover,
	.top_footer .widget.widget_categories ul li > a:hover,
	.top_footer .widget.widget_pages ul li > a:hover,
	.top_footer .widget.widget_meta ul li > a:hover,
	.top_footer .widget.widget_recent_comments ul li > a:hover,
	.top_footer .widget.widget_recent_entries ul li > a:hover,
	.top_footer .widget.widget_nav_menu ul li > a:hover,
	body.wpb-js-composer .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab.vc_active>a,
	.calendar_wrap thead,
	.gt3_practice_list__image-holder i,
	.load_more_works:hover,
	.copyright a:hover,
	.module_testimonial.type2 .testimonials-text:before,
	input[type="submit"]:hover,
	.gt3_add_social_item:hover,
	.gt3_add_hours_of_operation_item:hover,
	.gt3_social_color_wrapper .wp-picker-input-wrap .wp-picker-clear:hover,
	button:hover,
	.gt3_practice_list__title a:hover,
	.mc_form_inside #mc_signup_submit:hover,
	.pre_footer input[type="submit"]:hover,
	.team-icons .member-icon:hover,
	.gt3_listing_grid .card__address i,
	.gt3_listing_part .card__address i,
	.job_listings.grid .card__address i,
	.popup_address i,
	.gt3_listing_part .load_more_jobs:hover,
	.job_listings .load_more_jobs:hover,
	.single_listing_tags a:hover .tag_name,
	.gt3_social_sortable_handle,
	.hover_label,
	button.package__btn:hover,
	a:hover .post_media_link,
	.gt3_dropcap,
	.number_404,
	div.job_listings .load_more_jobs.load_previous:hover,
	.gt3_widget.job_manager ul.job_listings li.job_listing a:hover .position {
		color: '.$theme_color.';
	}

	.tooltip .btn {
		font-weight:'.$content_font_weight.';
		font-family:' . $content_font_family . ';
	}

	.uploader-btn .spacer:after {
		'.(!empty($bg_body) ? 'border: 15px solid '.$bg_body.';' : '').'
	}
	.gt3_breadcrumb_divider,
	.price_item .item_cost_wrapper,
	.main_menu_container .menu_item_line,
	.gt3_practice_list__link:before,
	.load_more_works,
	.content-container .vc_progress_bar .vc_single_bar .vc_bar,
	input[type="submit"],
	.gt3_add_social_item,
	.gt3_add_hours_of_operation_item,
	.gt3_social_color_wrapper .wp-picker-input-wrap .wp-picker-clear,
	button,
	.mc_form_inside #mc_signup_submit,
	.pre_footer input[type="submit"],
	.gt3_listing_part .load_more_jobs,
	.job_listings .load_more_jobs, 
	div.job_listings .load_more_jobs.load_previous{
		background-color: '.$theme_color.';
	}
	.calendar_wrap caption,
	.widget .calendar_wrap table td#today:before,
	.job-manager-form fieldset .job-manager-uploaded-files .job-manager-uploaded-file .job-manager-uploaded-file-preview a.job-manager-remove-uploaded-file,
	.package_head {
		background: '.$theme_color.';
	}
	.woocommerce .wishlist_table td.product-add-to-cart a,
	.gt3_module_button a,
	.woocommerce .widget_shopping_cart .buttons a, 
	.woocommerce.widget_shopping_cart .buttons a,
	.gt3_header_builder_cart_component .button,
	#content nav.job-manager-pagination ul li a:focus, 
	#content nav.job-manager-pagination ul li a:hover, 
	#content nav.job-manager-pagination ul li span.current, 
	nav.job-manager-pagination ul li a:focus, 
	nav.job-manager-pagination ul li a:hover, 
	nav.job-manager-pagination ul li span.current,
	.woocommerce nav.woocommerce-pagination ul li span.current,
    .woocommerce nav.woocommerce-pagination ul li a:focus, 
    .woocommerce nav.woocommerce-pagination ul li a:hover, 
    .woocommerce nav.woocommerce-pagination ul li span.current{
		border-color: '.$theme_color.';
		background: '.$theme_color.';
	}
	.woocommerce .wishlist_table td.product-add-to-cart a:hover,
	.woocommerce .widget_shopping_cart .buttons a:hover, 
	.woocommerce.widget_shopping_cart .buttons a:hover,
	.gt3_header_builder_cart_component .button:hover,
	.widget_search .search_form:before,
	.gt3_submit_wrapper:hover > i,
	div.job_listings .load_more_jobs:focus,
	div.job_listings .load_more_jobs:focus .gt3_btn_icon.fa,
	.job-manager-error.job-manager-message:before,
	.job-manager-info.job-manager-message:before,
	.job-manager-message.job-manager-message:before {
		color:'.$theme_color.';
	}
	.load_more_works,
	input[type="submit"],
	.gt3_add_social_item,
	.gt3_add_hours_of_operation_item,
	.gt3_social_color_wrapper .wp-picker-input-wrap .wp-picker-clear,
	button,
	.gt3_module_button a:hover,
	div.job_listings .load_more_jobs,
	div.job_listings .load_more_jobs:hover,
	div.job_listings .load_more_jobs:focus{
		border-color: '.$theme_color.';
	}

	.isotope-filter a:hover,
	.isotope-filter a.active,
	.gt3_practice_list__filter a:hover, 
	.gt3_practice_list__filter a.active {
		border-bottom-color: '.$theme_color.';
	}

	.gt3_module_button a:hover,
	.gt3_module_button a:hover .gt3_btn_icon.fa,
	.blog_post_preview .listing_meta a:hover {
		color: '.$theme_color.';
	}

	.widget_nav_menu .menu .menu-item:before,
	.gt3_icon_box__link a:before,
	.stripe_item-divider,
	.module_team .view_all_link:before,
	.gps_type_wrap label.active_unit {
		background-color: '.$theme_color.';
	}
	.single-member-page .member-icon:hover,
	.widget_nav_menu .menu .menu-item:hover>a,
	.single-member-page .team-link:hover,
	.module_team .view_all_link {
		color: '.$theme_color.';
	}

	.module_team .view_all_link:after {
		border-color: '.$theme_color.';
	}

	.video-popup__link:after {
		border-color: transparent transparent transparent '.$theme_color.';
	}

	/* menu fonts */
	.main-menu>ul,
	.main-menu>div>ul,
	.gt3_dasgboard_menu>ul,
	.gt3_login__user_name,
	.gt3_header_builder_login_component .gt3_header_builder__login-dropdown ul{
		font-family:'.esc_attr($menu_font_family).';
		font-weight:'.esc_attr($menu_font_weight).';
		line-height:'.esc_attr($menu_font_line_height).';
		font-size:'.esc_attr($menu_font_size).';
	}

	/* sub menu styles */
	.main-menu ul li ul.sub-menu,
	.gt3_dasgboard_menu ul.sub-menu,
	.gt3_header_builder_login_component .gt3_header_builder__login-dropdown ul,
	.gt3_currency_switcher ul,
	.main_header .header_search__inner .search_form,
	.mobile_menu_container {
		background-color: ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).' ;
		color: '.esc_attr( $sub_menu_color ).' ;
	}
	.main_header .header_search__inner .search_text::-webkit-input-placeholder{
		color: '.esc_attr( $sub_menu_color ).' !important;
	}
	.main_header .header_search__inner .search_text:-moz-placeholder {
		color: '.esc_attr( $sub_menu_color ).' !important;
	}
	.main_header .header_search__inner .search_text::-moz-placeholder {
		color: '.esc_attr( $sub_menu_color ).' !important;
	}
	.main_header .header_search__inner .search_text:-ms-input-placeholder {
		color: '.esc_attr( $sub_menu_color ).' !important;
	}
	.main_header .header_search .header_search__inner:after,
	.main-menu > ul > li > ul:before,
	.gt3_dasgboard_menu > ul > li > ul:before,
	.gt3_megamenu_triangle:before,
	.gt3_currency_switcher ul:before{
		border-bottom-color: ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).' ;
	}
	.main-menu > ul > li > ul:before,
	.gt3_dasgboard_menu > ul > li > ul:before,
	.gt3_megamenu_triangle:before,
	.gt3_currency_switcher ul:before {
	    -webkit-box-shadow: 0px 1px 0px 0px ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).';
	    -moz-box-shadow: 0px 1px 0px 0px ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).';
	    box-shadow: 0px 1px 0px 0px ' .(!empty($sub_menu_bg['rgba']) ? esc_attr( $sub_menu_bg['rgba'] ) : "transparent" ).';
	}

	/* blog */
	.team-icons .member-icon,
	body.wpb-js-composer .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab>a,
	.prev_next_links a b,
	ul.pagerblock li span,
	.gt3_module_featured_posts .listing_meta,
	.gt3_module_featured_posts .listing_meta a,
	.recent_posts .listing_meta a:hover,
	.post_meta a,
	.listing_meta,
	#job-manager-job-dashboard table ul.job-dashboard-actions a:hover,
	#job-manager-job-dashboard table ul.job-dashboard-actions li a.job-dashboard-action-delete:hover,
	#job-manager-review-moderate-board table ul.job-dashboard-actions a:hover,
	#job-manager-review-moderate-board table ul.job-dashboard-actions li a.job-dashboard-action-delete:hover,
	.widget_listing_sidebar_products .listing-products__items .price del,
	.woocommerce div.product p.price del, 
	.woocommerce div.product span.price del,
	.woocommerce div.product span.price del span.amount,
	.price del span.amount,
	.widget_listing_sidebar_products .listing-products__items .price del,
	.widget_listing_sidebar_products .listing-products__items .price del span.amount {
		color: '.$content_color.';
	}
	.gt3_dasgboard_menu > ul > .menu-item.current-menu-item > a,
	.blogpost_title a:hover,
	.gt3_module_featured_posts .listing_meta a:hover,
	.recent_posts .listing_meta a,
	.widget.widget_posts .recent_posts li > .recent_posts_content .post_title a:hover,
	.post_meta a:hover,
	.blog_post_preview h2.blog_listing_title a:hover,
	#job-manager-job-dashboard table ul.job-dashboard-actions a,
	#job-manager-job-dashboard table ul.job-dashboard-actions li a.job-dashboard-action-delete,
	#job-manager-review-moderate-board table ul.job-dashboard-actions a,
	#job-manager-review-moderate-board table ul.job-dashboard-actions li a.job-dashboard-action-delete {
		color: '.$theme_color.';
	}
	.blogpost_title i,
	.blog_post_media__icon--quote,
	.blog_post_media__icon--link {
		color: '.$theme_color.';
	}
	.gt3_dasgboard_menu,
	.learn_more:hover,
	.woocommerce .widget_shopping_cart .total, 
	.woocommerce.widget_shopping_cart .total,
	.module_team .view_all_link:hover,
	.read_more:hover,
	.blog_post_media--link .blog_post_media__link_text a {color: '.$header_font_color.';
	}
	.module_team .view_all_link:hover:before,
	.gt3_quote_author:before {
		background-color: '.$header_font_color.';
	}
	.module_team .view_all_link:hover:after {
		border-color: '.$header_font_color.';
	}

	#job-manager-review-moderate-board .review-action svg {
		fill: '.$theme_color.';
	}

	#job-manager-review-moderate-board .review-action:hover svg {
		fill: '.$content_color.';
	}

	.post_meta_categories,
	.post_meta_categories a {
		color: '.$theme_color3.';
	}

	.post_meta_categories a:hover,
	.gt3_module_featured_posts .item_wrapper .blog_content .featured_post_info .blogpost_title a:hover,
	 #job-manager-review-moderate-board a.review-action-unapprove:hover,
	#job-manager-review-moderate-board a.review-action-spam:hover,
	#job-manager-review-moderate-board a.review-action-trash:hover,
	#job-manager-review-moderate-board a.review-action-approve:hover {
		color: '.$theme_color.';
	}

	#job-manager-review-moderate-board .job-dashboard-actions a:hover .wpjmr-icon svg {
		fill: '.$theme_color.';
	}

	.learn_more span,
	.gt3_module_title .carousel_arrows a:hover span,
	.stripe_item:after,
	.packery-item .packery_overlay,
	.prev_next_links a span i,
	.wc-bookings-date-picker .ui-datepicker th{
		background: '.$theme_color.';
	}
	.learn_more span:before,
	.gt3_module_title .carousel_arrows a:hover span:before,
	.prev_next_links a span i:before {border-color: '.$theme_color.';
	}
	.learn_more:hover span,
	.gt3_module_title .carousel_arrows a span {background: '.$header_font_color.';
	}
	.learn_more:hover span:before,
	.gt3_module_title .carousel_arrows a span:before {border-color: '.$header_font_color.';
	}
	.likes_block,
	.isotope-filter a:hover,
	.isotope-filter a.active{
		color: '.$theme_color.';
	}
	.post_media_info,
	.gt3_practice_list__filter,
	.isotope-filter,
	blockquote cite,
	.wc-bookings-date-picker .ui-datepicker td{
		color: '.$header_font_color.';
	}

	.post_media_info:before,
	.quote_author:before,
	blockquote cite:before{
		background: '.$header_font_color.';
	}

	.gt3_module_title .external_link .learn_more {
		line-height:'.$content_line_height.';
	}

	.blog_type1 .blog_post_preview:before,
	.lwa-modal-close:before,
	.lwa-modal-close:after,
	.gt3_header_builder__login-modal-close:before,
	.gt3_header_builder__login-modal-close:after{
		background: '.$header_font_color.';
	}

	.post_share > a:before,
	.share_wrap a span {
		font-size:'.$content_font_size.';
	}

	.listing_rating_wrapper,
	.listing_comment .comment_author_says,
	.listing_comment .comment_author_says a {
		font-size:'.$content_font_size.';
		line-height:'.$content_line_height.';
	}

	.listing_comment_rp span {
		line-height:'.$content_line_height.';
	}

	ol.commentlist:after {
		'.(!empty($bg_body) ? 'background:'.$bg_body.';' : '').'
	}

	.main_wrapper ul li:before,
	.main_wrapper ol > li:before,
	.blog_post_media__link_text a:hover,
	h3#reply-title a,
	.comment_author_says a:hover,
	.dropcap,
	.gt3_custom_text a,
	.vc_toggle.vc_toggle_classic.vc_toggle_active .vc_toggle_title > h4,
	.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a .vc_tta-title-text,
	.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-controls-icon,
	.vc_toggle.vc_toggle_accordion_bordered.vc_toggle_active .vc_toggle_title > h4,
	.vc_tta-style-accordion_bordered .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-title-text,
	.gt3_custom_button i,
	.gt3_woo_login_switcher__link{
		color: '.$theme_color.';
	}
	.wc-bookings-booking-cost .woocommerce-Price-amount,
	.wc-bookings-booking-form label,
	.single .post_tags > span,
	h3#reply-title a:hover,
	.comment_author_says,
	.comment_author_says a,
	.wc-bookings-date-picker .ui-datepicker-title,
	.wc-bookings-date-picker .ui-datepicker .ui-datepicker-prev, 
	.wc-bookings-date-picker .ui-datepicker .ui-datepicker-next{
		color: '.$header_font_color.';
	}
	input[type="checkbox"]:before,
	.post_share > a:before,
	.post_share:hover > a:before,
	.post_share:hover > a,
	.likes_block .icon,
	.likes_block:not(.already_liked):hover,
	.comment-reply-link,
	.comment-reply-link:hover,
	.main_footer ul li:before,
	.gt3_twitter a{
		color: '.$theme_color2.';
	}

	.blog_post_media--quote,
	blockquote,
	.blog_post_media--link,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_alternative .vc_tta-controls-icon.vc_tta-controls-icon-plus::before,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_alternative .vc_tta-controls-icon.vc_tta-controls-icon-plus::after,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_alternative .vc_toggle_icon:before,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_alternative .vc_toggle_icon:after {
		border-color: '.$theme_color2.';
	}
	.widget_listing_sidebar_products .listing-products__items .cart .button.wc-bookings-booking-form-button,
	body.woocommerce div.product form.cart .button.wc-bookings-booking-form-button
	.widget_listing_sidebar_products .listing-products__items .cart .button.wc-bookings-booking-form-button:hover, 
	body.woocommerce div.product form.cart .button.wc-bookings-booking-form-button:hover,
	.widget_listing_sidebar_products .listing-products__items .cart .button,
	.widget_listing_sidebar_products .listing-products__items .cart .button:hover,
	body.woocommerce div.product form.cart .button.wc-bookings-booking-form-button{
		border-color: '.$theme_color2.';
	}	

	body.woocommerce button.button, 
	body .woocommerce button.button,
	.vc_toggle_classic.vc_toggle_active.vc_toggle_color_chevron .vc_toggle_icon,
	.vc_toggle_classic.vc_toggle_active.vc_toggle_color_chevron .vc_toggle_icon::before,
	.vc_toggle_accordion_bordered.vc_toggle_active.vc_toggle_color_plus .vc_toggle_icon::before,
	.vc_general .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title > a,
	.vc_toggle_accordion_bordered.vc_toggle_active .vc_toggle_icon::before,
	.vc_toggle.vc_toggle_active .vc_toggle_title,
	.vc_toggle.vc_toggle_accordion_solid.vc_toggle_active .vc_toggle_title,
	.vc_toggle_accordion_bordered.vc_toggle_active.vc_toggle_color_chevron .vc_toggle_icon::before,
	.vc_toggle_classic.vc_toggle_active.vc_toggle_color_triangle .vc_toggle_icon,
	.vc_toggle_classic.vc_toggle_active.vc_toggle_color_triangle .vc_toggle_icon::before,
	.vc_toggle_classic.vc_toggle_active.vc_toggle_color_plus .vc_toggle_icon,
	.vc_toggle_classic.vc_toggle_active.vc_toggle_color_plus .vc_toggle_icon::before,
	.vc_tta-panel.vc_active .vc_tta-controls-icon::before {
		border-color: '.$theme_color.';
	}
	
	.widget_listing_sidebar_products .listing-products__items .cart .button.wc-bookings-booking-form-button:hover, 
	body.woocommerce div.product form.cart .button.wc-bookings-booking-form-button:hover,
	.widget_listing_sidebar_products .listing-products__items .cart .button:hover{
		color: '.$theme_color2.';
	}
	.wc-bookings-date-picker .ui-datepicker table .bookable-range a:before,
	.wc-bookings-date-picker .ui-datepicker table .ui-datepicker-current-day a:before,
	.wc-bookings-date-picker .ui-datepicker td.ui-datepicker-today > a.ui-state-hover:before,
	.vc_general.vc_tta.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active::before,
	.wc-bookings-date-picker .ui-datepicker td > a:before,
	.wc-bookings-date-picker .ui-datepicker td.partial_booked a:before{
		background-color: '.$theme_color2.';
		color: '.$theme_color.';
	}

	.wc-bookings-date-picker .ui-datepicker td.partial_booked.bookable a:before{
		background-color: '.$theme_color2.' !important;
	}
	
	.quantity-spinner.quantity-down:before, 
	.quantity-spinner.quantity-up:before, 
	.quantity-spinner.quantity-up:after,
	.icon-box_number,
	#back_to_top,
	.listing_meta span:after,
	.module_testimonial .slick-dots li button,
	.vc_general.vc_tta.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active::before,
	body.wpb-js-composer .vc_tta.vc_tta-tabs .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title>a,
	body.wpb-js-composer .vc_tta.vc_general.vc_tta-tabs .vc_tta-tab.vc_active:before,
	body.wpb-js-composer .vc_row .vc_toggle_accordion_solid.vc_toggle_active .vc_toggle_title,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_solid .vc_active .vc_tta-panel-title>a {
		background-color: '.$theme_color.';
	}
	
	.widget_listing_sidebar_products .listing-products__items .cart .button,
	.widget_listing_sidebar_products .listing-products__items .cart .button.wc-bookings-booking-form-button, 
	body.woocommerce div.product form.cart .button.wc-bookings-booking-form-button,
	body.wpb-js-composer .vc_row .vc_tta.vc_tta-style-accordion_bordered .vc_tta-panel.vc_active .vc_tta-panel-title>a:before,
	.wc-bookings-date-picker .ui-datepicker td > a:before,
	.wc-bookings-date-picker .ui-datepicker td.partial_booked a:before,
	ul.pagerblock li a.current,
	ul.pagerblock li span,
	.tagcloud a:hover,
	.woo_mini-count > span:not(:empty) {
		background-color: '.$theme_color2.';
	}
	
	::-moz-selection {
		background: '.$theme_color.';
		color:#ffffff;
	}
	::selection {
		background: '.$theme_color.';
		color:#ffffff;
	}
	.preview_read_more_button {
		background-color:'. $theme_color .';
		border:1px solid '. $theme_color .';
	}
	.preview_read_more_button:hover {
		color: '. $theme_color .';
	}
	.pagerblock li a,
	.job-manager-form fieldset label small,
	.card_footer__container .btn_save_listing {
		color: '. $content_color .';
	}
	.comment-reply-link {
		color: '. $content_color .' !important;
	}
	.comment-reply-link:hover {
		color:'. $theme_color .' !important;
	}
	.pagerblock li.prev_page a:hover,
	.pagerblock li.next_page a:hover,
	.prev_next_links a:hover,
	.comment-edit-link:hover,
	.pagerblock li.next_page a:hover {
		color:'. $theme_color .';
	}
	.pagerblock li.pager_item a.current,
	.pagerblock li.pager_item a:hover {
		background: '. $theme_color .';
		border: '. $theme_color .' 1px solid;
	}
	.blog_post_media__link_text a {
		color: '.$content_color.' !important;
	}
    ';

    //sticky header logo 
    $header_sticky_height = gt3_option('header_sticky_height');
    $custom_css .='
    .gt3_practice_list__overlay:before{
    	background-color: '.$theme_color.';
    }

	input::-webkit-input-placeholder,
	textarea::-webkit-input-placeholder {
		color: '.$header_font_color.';
	}
	input:-moz-placeholder,
	textarea:-moz-placeholder { /* Firefox 18- */
		color: '.$header_font_color.';
	}
	input::-moz-placeholder,
	textarea::-moz-placeholder {  /* Firefox 19+ */
		color: '.$header_font_color.';
	}
	input:-ms-input-placeholder,
	textarea:-ms-input-placeholder {
		color: '.$header_font_color.';
	}
	
	.category-count,
	.gt3_imagebox_content_number {
		background:'. $theme_color .';
	}
	.marker-cluster_inner {
		fill:'. $theme_color .';
	}
	.diagram_item .chart,
	.item_title a ,
	.contentarea ul,
	#customer_login form .form-row label,
	.gt3_header_builder__login-modal_container form .form-row label,
	body .vc_pie_chart .vc_pie_chart_value,
	.contact_widget_socials,
	.contact_widget_email,
	.contact_widget_phone,
	.contact_widget_address{
		color:'. $header_font_color .';
	}
    body.wpb-js-composer .vc_row .vc_progress_bar:not(.vc_progress-bar-color-custom) .vc_single_bar .vc_label:not([style*="color"]) .vc_label_units{
    	color: '. $header_font_color .' !important;
    }

    .popular_searches_module {
    	color: '.$content_color.';
	}

	.gt3_listing_search_form input,
	.gt3_listing_search_form select,
	.gt3_listing_search_form button,
	.main_wrapper .chosen-single {
		font-family:' . $content_font_family . ';
	}

	.gt3_listing_search_form .search_jobs .search_submit_wrapper button {
		background: '.$theme_color.' !important;
	}

	.gt3_listing_search_form .search_jobs .search_submit_wrapper button:hover {
    	background: '.$header_font_color.' !important;
    }

    .main_wrapper .chosen-drop ul.chosen-results li:hover,
    .main_wrapper .chosen-drop ul.chosen-results li.result-selected {
    	color:'. $theme_color .' !important;
    }

    .main_wrapper .select-tags .chosen-container-multi .chosen-choices li.search-field input[type="text"] {
		border-color: '. $theme_color .' !important;
    	background: '.$theme_color.' !important;
	}

    .active-tag,
    .main_wrapper .chosen-choices li.search-choice {
    	border-color: '. $theme_color .';
    	background: '.$theme_color.' ;
    }

    .active-tag:hover,
    .main_wrapper .chosen-choices li.search-choice:hover {
    	color: '. $content_color .';
    	border-color: rgba('.gt3_HexToRGB($content_color).', 0.5);
    }

    .active-tag:hover .remove-tag:before,
	.active-tag:hover .remove-tag:after,
	.main_wrapper .chosen-choices li.search-choice:before,
	.main_wrapper .chosen-choices li.search-choice:after,
	.main_wrapper .chosen-choices li.search-choice:hover:before,
	.main_wrapper .chosen-choices li.search-choice:hover:after {
		background-color: '. $content_color .';
	}
	
	/* Footer */
		
	/* Widgets */
	.tagcloud a:hover {
		border-color:'. $theme_color .';
		background:'. $theme_color .';
	}	
	
	/* Listings Single */
	.fav_listing_item_location span i,
	.gt3_lst_meta span i {
		color:'. $theme_color .';
	}
	
	.lisging_single_breadcrumb span,
	.lisging_single_breadcrumb a {
		color:' .$content_color .';
	}
	.lisging_single_breadcrumb a:hover,
	.lisging_single_breadcrumb span.lisging_single_breadcrumb_posttitle {
		color:'. $theme_color .';
	}
	.lisging_single_breadcrumb span.listing_categ_divider,
	.gt3_module_carousel .slick-arrow:hover,
	.gt3_single_slider_controls a:hover,
	.nivo-directionNav .nivo-prevNav:hover,
	.nivo-directionNav .nivo-nextNav:hover {
		background:'. $theme_color .';
	}
	.module_testimonial.type4 .slick-arrow:hover {
		background:'. $theme_color .' !important;
	}
	.gt3_lst_right_part a.single_listing_go2review:hover,
	.gt3_dashboard_footer__add_listings>a:hover{
		border: '. $theme_color .' 2px solid;
	}

	.reservation_form input[type="reset"]:hover, 
	.reservation_form input[type="submit"]:hover, 
	.reservation_form button:hover {
		background: '. $theme_color .';
		border-color: '. $theme_color .';
	}
	.widget_listing_posts .listing_meta i,
	.contact_widget_email i,
	.contact_widget_phone i,
	.contact_widget_address i,
	.contact_widget_phone a,
	.contact_widget_address a,
	blockquote .gt3_quote_content:before,
	blockquote > p:first-child:before {
		color: '. $theme_color .';
	} 
	.contact_widget_wrapper .contact_widget_phone,
	.contact_widget_wrapper .contact_widget_phone a,
	.contact_widget_wrapper .contact_widget_email a {
		color: '. $header_font_color .';
	}
	
	/* Widgets */
	.working_time_title,
	.recent_post_meta a:hover {
		color:'. $theme_color .';
	}
	
	.widget_product_categories ul li:before,
	.widget_nav_menu ul li:before,
	.widget_archive ul li:before,
	.widget_pages ul li:before,
	.widget_categories ul li:before,
	.widget_recent_entries ul li:before,
	.widget_meta ul li:before,
	.widget_recent_comments ul li:before {
		background:'. $theme_color .';
	}
	.woocommerce ul.products li.product .price del,
	.widget_product_categories ul li a,
	.widget_nav_menu ul li a,
	.widget_archive ul li a,
	.widget_pages ul li a,
	.widget_categories ul li a,
	.widget_recent_entries ul li a,
	.widget_meta ul li a,
	.widget_recent_comments ul li a,
	.single_listing_tags a .tag_name {
		color: '.$content_color.';
	}

	.recent_post_meta,
	.recent_post_meta div,
	.recent_post_meta span,
	.recent_post_meta a,
	.module_testimonial.type4 .testimonials_author_position {
		color: '. $content_color .';
	}

	.single_listing_tags svg {
		color: '.$header_font_color.';
		fill: '.$header_font_color.';
	}

	.header_search__container input[type="text"]::-webkit-input-placeholder {
		color: '.$content_color.' !important;
	}
	.header_search__container input[type="text"]:-moz-placeholder { /* Firefox 18- */
		color: '.$content_color.' !important;
	}
	.header_search__container input[type="text"]::-moz-placeholder {  /* Firefox 19+ */
		color: '.$content_color.' !important;
	}
	.header_search__container input[type="text"]:-ms-input-placeholder {
		color: '.$content_color.' !important;
	}
	.header_search__container .header_search__inner .search_text {
		color: '.$content_color.';
	}

	';

    // footer styles
    $footer_text_color = gt3_option_compare('footer_text_color','mb_footer_switch','yes');
    $footer_heading_color = gt3_option_compare('footer_heading_color','mb_footer_switch','yes');
    $custom_css .= '.top_footer .widget-title,
    .top_footer strong,
    .top_footer .widget.widget_posts .recent_posts li > .recent_posts_content .post_title a,
    .top_footer .widget.widget_archive ul li > a,
	.top_footer .widget.widget_categories ul li > a,
	.top_footer .widget.widget_pages ul li > a,
	.top_footer .widget.widget_meta ul li > a,
	.top_footer .widget.widget_recent_comments ul li > a,
	.top_footer .widget.widget_recent_entries ul li > a,
	footer cite {
    	color: '.esc_attr($footer_heading_color).' ;
    }
    .top_footer,
    .top_footer .widget.widget_posts .recent_posts li > .recent_posts_content .post_title,
    .top_footer .widget.widget_archive ul li,
	.top_footer .widget.widget_categories ul li,
	.top_footer .widget.widget_pages ul li,
	.top_footer .widget.widget_meta ul li,
	.top_footer .widget.widget_recent_comments ul li,
	.top_footer .widget.widget_recent_entries ul li,
	.top_footer .calendar_wrap tbody {
    	color: '.esc_attr($footer_text_color).';
    }

    footer input[type="date"],
	footer input[type="email"],
	footer input[type="number"],
	footer input[type="password"],
	footer input[type="search"],
	footer input[type="tel"],
	footer input[type="text"],
	footer input[type="url"],
	footer select,
	footer textarea,
	footer table tbody tr,
	footer table thead tr,
	footer table tfoot tr,
	footer .tagcloud a {
		border-color: rgba('.gt3_HexToRGB($footer_text_color).', 0.5);
	}
	footer .widget_nav_menu .menu .menu-item  + .menu-item,
	footer .widget_nav_menu .menu .sub-menu{
		border-top: 1px solid rgba('.gt3_HexToRGB($footer_text_color).', 0.5);
	}
	';

    $copyright_text_color = gt3_option_compare('copyright_text_color','mb_footer_switch','yes');
    $custom_css .= '.main_footer .copyright,
    .copyright .widget-title,
    .copyright .widget.widget_posts .recent_posts li > .recent_posts_content .post_title a,
    .copyright .widget.widget_archive ul li > a,
	.copyright .widget.widget_categories ul li > a,
	.copyright .widget.widget_pages ul li > a,
	.copyright .widget.widget_meta ul li > a,
	.copyright .widget.widget_recent_comments ul li > a,
	.copyright .widget.widget_recent_entries ul li > a,
	.copyright strong{
    	color: '.esc_attr($copyright_text_color).';
    }';

    $header_on_bg = '';

    $header_color = gt3_option_compare('header_color','mb_customize_header_layout','custom');

    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
	    if (rwmb_meta('mb_header_on_bg') == '1' && rwmb_meta('mb_customize_header_layout') == 'custom') {
	    	$header_on_bg = rwmb_meta('mb_header_on_bg');
	    	
	    	if ($header_on_bg == '1') {

    		/////////////////////////
	    	$side_top_background_mobile = $side_middle_background_mobile = $side_bottom_background_mobile = $side_top_color_mobile = $side_middle_color_mobile = $side_bottom_color_mobile = '';

	        $mb_customize_top_header_layout_mobile = rwmb_meta('mb_customize_top_header_layout_mobile'); 
	        $mb_customize_middle_header_layout_mobile = rwmb_meta('mb_customize_middle_header_layout_mobile'); 
	        $mb_customize_bottom_header_layout_mobile = rwmb_meta('mb_customize_bottom_header_layout_mobile'); 

	        if ($mb_customize_top_header_layout_mobile == 'custom') {
	        	//top
				$mb_top_header_background_mobile = rwmb_meta('mb_top_header_background_mobile');
	            $mb_top_header_background_opacity_mobile = rwmb_meta('mb_top_header_background_opacity_mobile');
	            $side_top_color_mobile = rwmb_meta('mb_top_header_color_mobile');
            
	            if (!empty($mb_top_header_background_mobile)) {
	                $side_top_background_mobile = 'rgba('.(gt3_HexToRGB($mb_top_header_background_mobile)).','.$mb_top_header_background_opacity_mobile.')';
	            }else{
	                $side_top_background_mobile = '';
	            }
	        }

	        if ($mb_customize_middle_header_layout_mobile == 'custom') {
	        	//middle
				$mb_middle_header_background_mobile = rwmb_meta('mb_middle_header_background_mobile');
	            $mb_middle_header_background_opacity_mobile = rwmb_meta('mb_middle_header_background_opacity_mobile');
	            $side_middle_color_mobile = rwmb_meta('mb_middle_header_color_mobile');
          
	            if (!empty($mb_middle_header_background_mobile)) {
	                $side_middle_background_mobile = 'rgba('.(gt3_HexToRGB($mb_middle_header_background_mobile)).','.$mb_middle_header_background_opacity_mobile.')';
	            }else{
	                $side_middle_background_mobile = '';
	            }
	        }

	        if ($mb_customize_bottom_header_layout_mobile == 'custom') {
	        	//bottom
				$mb_bottom_header_background_mobile = rwmb_meta('mb_bottom_header_background_mobile');
	            $mb_bottom_header_background_opacity_mobile = rwmb_meta('mb_bottom_header_background_opacity_mobile');
	            $side_bottom_color_mobile = rwmb_meta('mb_bottom_header_color_mobile');
          
	            if (!empty($mb_bottom_header_background_mobile)) {
	                $side_bottom_background_mobile = 'rgba('.(gt3_HexToRGB($mb_bottom_header_background_mobile)).','.$mb_bottom_header_background_opacity_mobile.')';
	            }else{
	                $side_bottom_background_mobile = '';
	            }
	        }
		    /////////////////////////////////





	    	}

	    }
	}

	$custom_css .= '
	.toggle-inner, .toggle-inner:before, .toggle-inner:after{
		background-color:'.esc_attr($header_color).';
	}';

	$logo_limit_on_mobile = gt3_option("logo_limit_on_mobile");

	if ($logo_limit_on_mobile == '1') {
		$logo_mobile_width = gt3_option("logo_mobile_width");
		if (!empty($logo_mobile_width['width'])) {
			$custom_css .= '@media only screen and (max-width: 767px){
				.header_side_container .logo_container:not(.logo_mobile_not_limited){
					max-width: '.(int)$logo_mobile_width['width'].'px;
				}
			}';
		}
	}

    if ($header_on_bg == '1') {

    	$custom_css .= '@media only screen and (max-width: 767px){
    		.gt3_header_builder__section--top{
    			background-color: '.esc_attr($side_top_background_mobile).' !important;
		    	color: '.esc_attr($side_top_color_mobile).' !important;
    		}
    		.gt3_header_builder__section--top .gt3_header_builder_button_component a,
		    .gt3_header_builder__section--top .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color: '.esc_attr($side_top_color_mobile).' !important;
		    }
    		.gt3_header_builder__section--middle{
    			background-color: '.esc_attr($side_middle_background_mobile).' !important;
		    	color: '.esc_attr($side_middle_color_mobile).' !important;
    		}
    		.gt3_header_builder__section--middle .gt3_header_builder_button_component a,
		    .gt3_header_builder__section--middle .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color: '.esc_attr($side_middle_color_mobile).' !important;
		    }
    		.gt3_header_builder__section--bottom{
    			background-color: '.esc_attr($side_bottom_background_mobile).' !important;
		    	color: '.esc_attr($side_bottom_color_mobile).' !important;
    		}
    		.gt3_header_builder__section--bottom .gt3_header_builder_button_component a,
		    .gt3_header_builder__section--bottom .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color: '.esc_attr($side_bottom_color_mobile).' !important;
		    }
		}
	    ';
    }

    /* Woocommerce */

    $custom_css .= '
    ul.pagerblock li a:hover,
    .woocommerce nav.woocommerce-pagination ul li a:focus, 
    .woocommerce nav.woocommerce-pagination ul li a:hover,  
    .woocommerce-Tabs-panel h2,
    .woocommerce-Tabs-panel h2 span,
    .woocommerce ul.product_list_widget li .gt3-widget-product-wrapper .product-title,
    .woocommerce-cart .cart_totals h2,
    .woocommerce-checkout h3,
    .woocommerce-checkout h3 span,
    .gt3-shop-product .gt3-product-title {
    	font-family:' . $content_font_family . ';
    }

    .gt3-category-item__title {
    	font-family: ' . $header_font_family . ';
    }
    .yith-wcwl-add-button .add_to_wishlist,
    .woocommerce .gt3-products-header .gridlist-toggle>a,
    .woocommerce ul.product_list_widget li .gt3-widget-product-wrapper .woocommerce-Price-amount,
    .widget.widget_product_categories ul li > a:hover,
    .woocommerce-cart .cart_totals table.shop_table .shipping-calculator-button,
    .widget.widget_product_categories ul.children li>a:hover,
    .woocommerce div.product p.price, 
    .woocommerce div.product span.price,
    p.price, 
    .price ins,
    .price span.amount{
    	color: '.$theme_color2.';
    }
    .woocommerce-MyAccount-navigation ul li a.is-active,
    .woocommerce #reviews .comment-reply-title,
    .woocommerce.single-product #respond #commentform .comment-form-rating label,
    .woocommerce ul.product_list_widget li .gt3-widget-product-wrapper .product-title,
    .woocommerce ul.product_list_widget li .gt3-widget-product-wrapper ins,
    .widget.widget_product_categories ul li > a,
    .widget.widget_product_categories ul li:before,
    .woocommerce table.shop_table thead th,
    .woocommerce table.shop_table td,
    .woocommerce-cart .cart_totals h2,
    .woocommerce form.woocommerce-checkout .form-row label,
    .woocommerce-checkout h3,
    .woocommerce-checkout h3 span,
    .woocommerce form .form-row .required,
    .woocommerce table.woocommerce-checkout-review-order-table tfoot th,
    #add_payment_method #payment label,
	.woocommerce-cart #payment label, 
	.woocommerce-checkout #payment label,
    .woocommerce div.product .gt3-product_info-wrapper span.price ins,
    .results {
    	color: '.$header_font_color.';
    }
    .gt3-category-item__title {
    	color: '.$header_font_color.' !important;
    }
    .listing-products__items .woocommerce-message .button,
    .woocommerce #respond input#submit.alt, 
    .woocommerce a.button.alt, 
    .woocommerce button.button.alt, 
    .woocommerce input.button.alt,
    .woocommerce #reviews #respond input#submit, 
	.woocommerce #reviews a.button, 
	.woocommerce #reviews button.button, 
	.woocommerce #reviews input.button,
	body.woocommerce a.button,
	.woocommerce #respond input#submit,
	.woocommerce button.button, 
	body .woocommerce button.button, 
	.woocommerce input.button,
	.woocommerce .actions button.button,
	.woocommerce button,
	.woocommerce table.shop_table thead th,
	.woocommerce #respond input#submit, 
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,
	.woocommerce-MyAccount-navigation ul li.is-active:after,
	table.job-manager-bookmarks thead th{
		background-color: '.$theme_color.';
	}
	.woocommerce #respond input#submit:hover, 
	.woocommerce a.button:hover, 
	.woocommerce button.button:hover, 
	.woocommerce input.button:hover,
	.woocommerce a.button:hover,
	.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover {
		color: '.$theme_color.';
	}
	.woocommerce #respond input#submit, 
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,
	.woocommerce a.button,
	.woocommerce #respond input#submit,
	.woocommerce button.button, 
	.woocommerce input.button{
		border-color: '.$theme_color.';
	}

    .woocommerce ul.products li.product .onsale,
    .woocommerce .gt3-products-header .gridlist-toggle>a.active,
    .woocommerce div.product .woocommerce-tabs ul.tabs li a:before,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
    .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
	#yith-quick-view-content .onsale,
    .woocommerce span.onsale,
	.woocommerce button.button.alt.disabled, 
	.woocommerce button.button.alt.disabled:hover,
	.yith-wcwl-add-button:hover {
    	background-color: '.$theme_color2.';
    }
    .yith-wcwl-add-button:hover {
    	border-color: '.$theme_color2.';
    }
    .woocommerce div.product .woocommerce-tabs ul.tabs li a:after {
    	border-bottom-color: '.$theme_color2.' !important;
    }
    ';
    
    /* ! Woocommerce */

    if (class_exists( 'RWMB_Loader' ) && get_queried_object_id() !== 0) {
        $mb_header_presets = rwmb_meta('mb_header_presets');            
        if ($mb_header_presets != 'default' && !empty($mb_header_presets) ) {
            $presets = gt3_header_presets ();
            if (!empty($presets)) {
	            $preset = json_decode($presets[$mb_header_presets],true); 
	            $side_top_background = gt3_option_presets($preset,'side_top_background');
				$side_top_background = $side_top_background['rgba'];
				$side_top_color = gt3_option_presets($preset,'side_top_color');
				$side_top_color_hover = gt3_option_presets($preset,'side_top_color_hover');
				$side_top_height = gt3_option_presets($preset,'side_top_height');
				$side_top_height = $side_top_height['height'];

				$side_middle_background = gt3_option_presets($preset,'side_middle_background');
				$side_middle_background = $side_middle_background['rgba'];
				$side_middle_color = gt3_option_presets($preset,'side_middle_color');
				$side_middle_color_hover = gt3_option_presets($preset,'side_middle_color_hover');
				$side_middle_height = gt3_option_presets($preset,'side_middle_height');
				$side_middle_height = $side_middle_height['height'];

				$side_bottom_background = gt3_option_presets($preset,'side_bottom_background');
				$side_bottom_background = $side_bottom_background['rgba'];
				$side_bottom_color = gt3_option_presets($preset,'side_bottom_color');
				$side_bottom_color_hover = gt3_option_presets($preset,'side_bottom_color_hover');
				$side_bottom_height = gt3_option_presets($preset,'side_bottom_height');
				$side_bottom_height = $side_bottom_height['height'];    

				$side_top_border = (bool)gt3_option_presets($preset,"side_top_border");
				$side_top_border_color = gt3_option_presets($preset,"side_top_border_color");
				$side_middle_border = (bool)gt3_option_presets($preset,"side_middle_border");
				$side_middle_border_color = gt3_option_presets($preset,"side_middle_border_color");		    
			    $side_bottom_border = (bool)gt3_option_presets($preset,"side_bottom_border");
			    $side_bottom_border_color = gt3_option_presets($preset,"side_bottom_border_color");

			    $header_sticky = gt3_option_presets($preset,"header_sticky");
			    $side_top_sticky = gt3_option_presets($preset,'side_top_sticky');
				$side_top_background_sticky = gt3_option_presets($preset,'side_top_background_sticky');
				$side_top_color_sticky = gt3_option_presets($preset,'side_top_color_sticky');
				$side_top_color_hover_sticky = gt3_option_presets($preset,'side_top_color_hover_sticky');
				$side_top_height_sticky = gt3_option_presets($preset,'side_top_height_sticky');

				$side_middle_sticky = gt3_option_presets($preset,'side_middle_sticky');
				$side_middle_background_sticky = gt3_option_presets($preset,'side_middle_background_sticky');
				$side_middle_color_sticky = gt3_option_presets($preset,'side_middle_color_sticky');
				$side_middle_color_hover_sticky = gt3_option_presets($preset,'side_middle_color_hover_sticky');
				$side_middle_height_sticky = gt3_option_presets($preset,'side_middle_height_sticky');

				$side_bottom_sticky = gt3_option_presets($preset,'side_bottom_sticky');
				$side_bottom_background_sticky = gt3_option_presets($preset,'side_bottom_background_sticky');
				$side_bottom_color_sticky = gt3_option_presets($preset,'side_bottom_color_sticky');
				$side_bottom_color_hover_sticky = gt3_option_presets($preset,'side_bottom_color_hover_sticky');
				$side_bottom_height_sticky = gt3_option_presets($preset,'side_bottom_height_sticky');
			}
        }

        $mb_customize_header_layout = rwmb_meta('mb_customize_header_layout'); 
        if ($mb_customize_header_layout == 'custom') {
	        $mb_customize_top_header_layout = rwmb_meta('mb_customize_top_header_layout'); 
	        $mb_customize_middle_header_layout = rwmb_meta('mb_customize_middle_header_layout'); 
	        $mb_customize_bottom_header_layout = rwmb_meta('mb_customize_bottom_header_layout'); 

	        if ($mb_customize_top_header_layout == 'custom') {
	        	//top
				$mb_top_header_background = rwmb_meta('mb_top_header_background');
	            $mb_top_header_background_opacity = rwmb_meta('mb_top_header_background_opacity');
	            $side_top_color = rwmb_meta('mb_top_header_color');
	            $side_top_color_hover = rwmb_meta('mb_top_header_color_hover');
	            $side_top_border = rwmb_meta('mb_top_header_bottom_border');
	            $mb_header_top_bottom_border_color = rwmb_meta('mb_header_top_bottom_border_color');
	            $mb_header_top_bottom_border_color_opacity = rwmb_meta('mb_header_top_bottom_border_color_opacity');

	            if (!empty($mb_header_top_bottom_border_color)) {
	                $side_top_border_color['rgba'] = 'rgba('.(gt3_HexToRGB($mb_header_top_bottom_border_color)).','.$mb_header_top_bottom_border_color_opacity.')';
	            }else{
	                $side_top_border_color['rgba'] = '';
	            }            
	            if (!empty($mb_top_header_background)) {
	                $side_top_background = 'rgba('.(gt3_HexToRGB($mb_top_header_background)).','.$mb_top_header_background_opacity.')';
	            }else{
	                $side_top_background = '';
	            }
	        }

	        if ($mb_customize_middle_header_layout == 'custom') {
	        	//middle
				$mb_middle_header_background = rwmb_meta('mb_middle_header_background');
	            $mb_middle_header_background_opacity = rwmb_meta('mb_middle_header_background_opacity');
	            $side_middle_color = rwmb_meta('mb_middle_header_color');
	            $side_middle_color_hover = rwmb_meta('mb_middle_header_color_hover');
	            $side_middle_border = rwmb_meta('mb_middle_header_bottom_border');
	            $mb_header_middle_bottom_border_color = rwmb_meta('mb_header_middle_bottom_border_color');
	            $mb_header_middle_bottom_border_color_opacity = rwmb_meta('mb_header_middle_bottom_border_color_opacity');

	            if (!empty($mb_header_middle_bottom_border_color)) {
	                $side_middle_border_color['rgba'] = 'rgba('.(gt3_HexToRGB($mb_header_middle_bottom_border_color)).','.$mb_header_middle_bottom_border_color_opacity.')';
	            }else{
	                $side_middle_border_color['rgba'] = '';
	            }            
	            if (!empty($mb_middle_header_background)) {
	                $side_middle_background = 'rgba('.(gt3_HexToRGB($mb_middle_header_background)).','.$mb_middle_header_background_opacity.')';
	            }else{
	                $side_middle_background = '';
	            }
	        }

	        if ($mb_customize_bottom_header_layout == 'custom') {
	        	//bottom
				$mb_bottom_header_background = rwmb_meta('mb_bottom_header_background');
	            $mb_bottom_header_background_opacity = rwmb_meta('mb_bottom_header_background_opacity');
	            $side_bottom_color = rwmb_meta('mb_bottom_header_color');
	            $side_bottom_color_hover = rwmb_meta('mb_side_bottom_color_hover');
	            $side_bottom_border = rwmb_meta('mb_bottom_header_bottom_border');
	            $mb_header_bottom_bottom_border_color = rwmb_meta('mb_header_bottom_bottom_border_color');
	            $mb_header_bottom_bottom_border_color_opacity = rwmb_meta('mb_header_bottom_bottom_border_color_opacity');

	            if (!empty($mb_header_bottom_bottom_border_color)) {
	                $side_bottom_border_color['rgba'] = 'rgba('.(gt3_HexToRGB($mb_header_bottom_bottom_border_color)).','.$mb_header_bottom_bottom_border_color_opacity.')';
	            }else{
	                $side_bottom_border_color['rgba'] = '';
	            }            
	            if (!empty($mb_bottom_header_background)) {
	                $side_bottom_background = 'rgba('.(gt3_HexToRGB($mb_bottom_header_background)).','.$mb_bottom_header_background_opacity.')';
	            }else{
	                $side_bottom_background = '';
	            }
	        }
	    }
    }
    $custom_css .= '
    .gt3_header_builder__section--top{
    	background-color:'.esc_attr($side_top_background).';
    	color:'.esc_attr($side_top_color).';
    	height:'.(int)$side_top_height.'px;
    }
    .gt3_header_builder__section--top .gt3_header_builder_button_component a,
    .gt3_header_builder__section--top .gt3_header_builder_button_component a .gt3_btn_icon{
    	color:'.esc_attr($side_top_color).' !important;
    }
    .gt3_header_builder__section--top a:hover,
    .gt3_header_builder__section--top .current-menu-item a,
    .gt3_header_builder__section--top .current-menu-ancestor > a,
    .gt3_header_builder__section--top .main-menu ul li ul .menu-item.current-menu-item > a,
    .gt3_header_builder__section--top .main-menu ul li ul .menu-item.current-menu-ancestor > a,
    .gt3_header_builder__section--top .main-menu ul li ul .menu-item > a:hover,
    .gt3_header_builder__section--top .main-menu .menu-item:hover > a,
    .gt3_header_builder__section--top .gt3_header_builder_login_component:hover .gt3_login__user_name{
    	color:'.esc_attr($side_top_color_hover).';
    }
    .gt3_header_builder__section--top .gt3_header_builder_button_component a{
    	border-color:'.esc_attr($side_top_color_hover).';
    }
    .gt3_header_builder__section--top .gt3_header_builder_button_component a:hover{
    	background-color:'.esc_attr($side_top_color_hover).' !important;
    }
    .gt3_header_builder__section--top .gt3_header_builder__section-container{
    	height:'.(int)$side_top_height.'px;
    }
    .gt3_header_builder__section--middle{
    	background-color:'.esc_attr($side_middle_background).';
    	color:'.esc_attr($side_middle_color).';
    }
    .gt3_header_builder__section--middle .gt3_header_builder_button_component a,
    .gt3_header_builder__section--middle .gt3_header_builder_button_component a .gt3_btn_icon{
    	color:'.esc_attr($side_middle_color).' !important;
    }
    .gt3_header_builder__section--middle a:hover,
    .gt3_header_builder__section--middle .current-menu-item a,
    .gt3_header_builder__section--middle .current-menu-ancestor > a,
    .gt3_header_builder__section--middle .main-menu ul li ul .menu-item.current-menu-item > a,
    .gt3_header_builder__section--middle .main-menu ul li ul .menu-item.current-menu-ancestor > a,
    .gt3_header_builder__section--middle .main-menu ul li ul .menu-item > a:hover,
    .gt3_header_builder__section--middle .main-menu .menu-item:hover > a,
    .gt3_header_builder__section--middle .gt3_header_builder_login_component:hover .gt3_login__user_name{
    	color:'.esc_attr($side_middle_color_hover).';
    }
    .gt3_header_builder__section--middle .gt3_header_builder_button_component a{
    	border-color:'.esc_attr($side_middle_color_hover).';
    }
    .gt3_header_builder__section--middle .gt3_header_builder_button_component a:hover{
    	background-color:'.esc_attr($side_middle_color_hover).' !important;
    }
    .gt3_header_builder__section--middle .gt3_header_builder__section-container{
    	height:'.(int)$side_middle_height.'px;
    }
    .gt3_header_builder__section--bottom{
    	background-color:'.esc_attr($side_bottom_background).';
    	color:'.esc_attr($side_bottom_color).';
    }
    .gt3_header_builder__section--bottom .gt3_header_builder_button_component a,
    .gt3_header_builder__section--bottom .gt3_header_builder_button_component a .gt3_btn_icon{
    	color:'.esc_attr($side_bottom_color).' !important;
    }
    .gt3_header_builder__section--bottom a:hover,
    .gt3_header_builder__section--bottom .current-menu-item a,
    .gt3_header_builder__section--bottom .current-menu-ancestor > a,
    .gt3_header_builder__section--bottom .main-menu ul li ul .menu-item.current-menu-item > a,
    .gt3_header_builder__section--bottom .main-menu ul li ul .menu-item.current-menu-ancestor > a,
    .gt3_header_builder__section--bottom .main-menu ul li ul .menu-item > a:hover,
    .gt3_header_builder__section--bottom .main-menu .menu-item:hover > a,
    .gt3_header_builder__section--bottom .gt3_header_builder_login_component:hover .gt3_login__user_name{
    	color:'.esc_attr($side_bottom_color_hover).';
    }
    .gt3_header_builder__section--bottom .gt3_header_builder_button_component a{
    	border-color:'.esc_attr($side_bottom_color_hover).';
    }
    .gt3_header_builder__section--bottom .gt3_header_builder_button_component a:hover{
    	background-color:'.esc_attr($side_bottom_color_hover).' !important;
    }
    .gt3_header_builder__section--bottom .gt3_header_builder__section-container{
    	height:'.(int)$side_bottom_height.'px;
    }
    .tp-bullets.custom .tp-bullet:after,
    .tp-bullets.custom .tp-bullet:hover:after,
	.tp-bullets.custom .tp-bullet.selected:after {
		background: '.$theme_color2.';
	}
    ';

	/* Modules Part */
	$custom_css .= '

	';

	$show_woo_account_menu = gt3_option('show_woo_account_menu');
	if (isset($show_woo_account_menu) && $show_woo_account_menu == '0') {
		$custom_css .= '.woocommerce-MyAccount-navigation{
			display: none;
		}';
	}

    if ($side_top_border) {
    	if (!empty($side_top_border_color['rgba'])) {
    		$custom_css .= '
		    .gt3_header_builder__section--top{
		    	border-bottom: 1px solid '.esc_attr($side_top_border_color['rgba']).';
		    }';
    	}
    }

    if ($side_middle_border) {
    	if (!empty($side_middle_border_color['rgba'])) {
    		$custom_css .= '
		    .gt3_header_builder__section--middle{
		    	border-bottom: 1px solid '.esc_attr($side_middle_border_color['rgba']).';
		    }';
    	}
    }

    if ($side_bottom_border) {
    	if (!empty($side_bottom_border_color['rgba'])) {
    		$custom_css .= '
		    .gt3_header_builder__section--bottom{
		    	border-bottom: 1px solid '.esc_attr($side_bottom_border_color['rgba']).';
		    }';
    	}
    }

    if ((bool)$header_sticky) {

    	if ((bool)$side_top_sticky) {
			$side_top_background_sticky = $side_top_background_sticky['rgba'];
			$side_top_height_sticky = $side_top_height_sticky['height'];
			$custom_css .= '
		    .sticky_header .gt3_header_builder__section--top{
		    	background-color:'.esc_attr($side_top_background_sticky).';
		    	color:'.esc_attr($side_top_color_sticky).';
		    }
		    .sticky_header .gt3_header_builder__section--top .gt3_header_builder_button_component a,
		    .sticky_header .gt3_header_builder__section--top .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color:'.esc_attr($side_top_color_sticky).' !important;
		    }
		    .sticky_header .gt3_header_builder__section--top .gt3_header_builder__section-container{
		    	height:'.(int)$side_top_height_sticky.'px;
		    }';
    	}
    	
    	if ((bool)$side_middle_sticky) {
			$side_middle_background_sticky = $side_middle_background_sticky['rgba'];
			$side_middle_height_sticky = $side_middle_height_sticky['height'];
			$custom_css .= '
		    .sticky_header .gt3_header_builder__section--middle{
		    	background-color:'.esc_attr($side_middle_background_sticky).';
		    	color:'.esc_attr($side_middle_color_sticky).';
		    }
		    .sticky_header .gt3_header_builder__section--middle .gt3_header_builder_button_component a,
		    .sticky_header .gt3_header_builder__section--middle .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color:'.esc_attr($side_middle_color_sticky).' !important;
		    }
		    .sticky_header .gt3_header_builder__section--middle .gt3_header_builder__section-container{
		    	height:'.(int)$side_middle_height_sticky.'px;
		    }';
    	}		

    	if ((bool)$side_bottom_sticky) {
			$side_bottom_background_sticky = $side_bottom_background_sticky['rgba'];
			$side_bottom_height_sticky = $side_bottom_height_sticky['height'];
			$custom_css .= '
		    .sticky_header .gt3_header_builder__section--bottom{
		    	background-color:'.esc_attr($side_bottom_background_sticky).';
		    	color:'.esc_attr($side_bottom_color_sticky).';
		    }
		    .sticky_header .gt3_header_builder__section--bottom .gt3_header_builder_button_component a,
		    .sticky_header .gt3_header_builder__section--bottom .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color:'.esc_attr($side_bottom_color_sticky).' !important;
		    }
		    .sticky_header .gt3_header_builder__section--bottom .gt3_header_builder__section-container{
		    	height:'.(int)$side_bottom_height_sticky.'px;
		    }';
    	}
    }

    if ($header_on_bg == '1') {

    	$custom_css .= '@media only screen and (max-width: 767px){
    		.gt3_header_builder__section--top{
    			background-color: '.esc_attr($side_top_background_mobile).' !important;
		    	color: '.esc_attr($side_top_color_mobile).' !important;
    		}
    		.gt3_header_builder__section--top .gt3_header_builder_button_component a,
		    .gt3_header_builder__section--top .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color: '.esc_attr($side_top_color_mobile).' !important;
		    }
    		.gt3_header_builder__section--middle{
    			background-color: '.esc_attr($side_middle_background_mobile).' !important;
		    	color: '.esc_attr($side_middle_color_mobile).' !important;
    		}
    		.gt3_header_builder__section--middle .gt3_header_builder_button_component a,
		    .gt3_header_builder__section--middle .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color: '.esc_attr($side_middle_color_mobile).' !important;
		    }
    		.gt3_header_builder__section--bottom{
    			background-color: '.esc_attr($side_bottom_background_mobile).' !important;
		    	color: '.esc_attr($side_bottom_color_mobile).' !important;
    		}
    		.gt3_header_builder__section--bottom .gt3_header_builder_button_component a,
		    .gt3_header_builder__section--bottom .gt3_header_builder_button_component a .gt3_btn_icon{
		    	color: '.esc_attr($side_bottom_color_mobile).' !important;
		    }
		}
	    ';
    }
    

    $custom_user_css = gt3_option("custom_css");
    $custom_css .= isset($custom_user_css) ? '/* Custom Css */'.$custom_user_css : '';

	$custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $custom_css);
	wp_add_inline_style( 'gt3_composer', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'gt3_custom_styles' );
