<?php
if (!class_exists( 'WP_Job_Manager' )) {
    return;
}
$defaults = array(
	'items_per_line' 			=> '3',
	'per_page'                  => get_option( 'job_manager_per_page' ),
	'orderby'                   => 'featured',
	'order'                     => 'DESC',

	// Filters + cats
	'show_filters'              => true,
	'show_categories'           => true,
	'show_category_multiselect' => get_option( 'job_manager_enable_default_category_multiselect', false ),
	'pagination_type' 			=> 'no',

	// Limit what jobs are shown based on category, post status, and type
	'categories'                => '',
	'job_types'                 => '',
	'post_status'               => '',
	'featured'                  => null, // True to show only featured, false to hide featured, leave null to show both.
	'filled'                    => null, // True to show only filled, false to hide filled, leave null to show both/use the settings.

	// Default values for filters
	'location'                  => '',
	'keywords'                  => '',
	'selected_category'         => '',
	'selected_job_types'        => implode( ',', array_values( get_job_listing_types( 'id=>slug' ) ) ),

	// Carousel Setts
	'autoplay_carousel' => 'yes',
	'use_carousel' => '',
	'auto_play_time' => '3000',
	'scroll_items' => 'yes',
	'infinite_scroll' => 'yes',
	'use_pagination_carousel' => 'yes',
	'use_prev_next_carousel' => '',
	'adaptive_height' => 'yes',
);

$atts = vc_shortcode_attribute_parse($defaults, $atts);
extract($atts);

if ( ! get_option( 'job_manager_enable_categories' ) ) {
	$show_categories = false;
}

// String and bool handling
$show_filters              = !empty($show_filters) ? $show_filters : false;
$show_categories           = !empty($show_categories) ? $show_categories : false;
$show_pagination = $pagination_type == 'pagination' ? true : false;
$show_more = $pagination_type == 'load_more' ? true : false;
ob_start();

if ( ! is_null( $featured ) ) {
	$featured = ( is_bool( $featured ) && $featured ) || in_array( $featured, array( '1', 'true', 'yes' ) ) ? true : false;
}

if ( ! is_null( $filled ) ) {
	$filled = ( is_bool( $filled ) && $filled ) || in_array( $filled, array( '1', 'true', 'yes' ) ) ? true : false;
}

// Array handling
$categories         = is_array( $categories ) ? $categories : array_filter( array_map( 'trim', explode( ',', $categories ) ) );
$job_types          = is_array( $job_types ) ? $job_types : array_filter( array_map( 'trim', explode( ',', $job_types ) ) );
$post_status        = is_array( $post_status ) ? $post_status : array_filter( array_map( 'trim', explode( ',', $post_status ) ) );
$selected_job_types = is_array( $selected_job_types ) ? $selected_job_types : array_filter( array_map( 'trim', explode( ',', $selected_job_types ) ) );

// Get keywords and location from querystring if set
if ( ! empty( $_GET['search_keywords'] ) ) {
	$keywords = sanitize_text_field( $_GET['search_keywords'] );
}
if ( ! empty( $_GET['search_location'] ) ) {
	$location = sanitize_text_field( $_GET['search_location'] );
}
if ( ! empty( $_GET['search_category'] ) ) {
	$selected_category = sanitize_text_field( $_GET['search_category'] );
}


$data_attributes        = array(
	'location'        => $location,
	'keywords'        => $keywords,
	'show_filters'    => $show_filters ? 'true' : 'false',
	'show_pagination' => $show_pagination ? 'true' : 'false',
	'per_page'        => $per_page,
	'orderby'         => $orderby,
	'order'           => $order,
	'categories'      => implode( ',', $categories ),
);

$carousel_parent = '';

if ($use_carousel == 'yes') {
	$carousel_parent = 'gt3_module_carousel';

	$auto_play_time = (int)$auto_play_time;

	wp_enqueue_script('gt3_slick_js', get_template_directory_uri() . '/js/slick.min.js', array(), false, false);
	switch ($items_per_line) {
		case '2':
			$responsive_1024 = 2;
			$responsive_760 = 1;
			break;
		case '3':
			$responsive_1024 = 3;
			$responsive_760 = 1;
			break;
		case '4':
			$responsive_1024 = 3;
			$responsive_760 = 1;
			break;

		default:
			$responsive_1024 = 1;
			$responsive_760 = 1;
			break;
	}

	$responsive_sltscrl_1024 = $responsive_1024;
	$responsive_sltscrl_760 = $responsive_760;
	if ($scroll_items == 'yes') {
		$responsive_sltscrl_1024 = $responsive_sltscrl_760 = '1';
	}
	$slick_settings = '';
	$slick_settings .= isset($items_per_line) ? '"slidesToShow": '.esc_attr($items_per_line).',' : '"slidesToShow": 1,';
	if ($scroll_items == 'yes') {
		$slick_settings .= '"slidesToScroll": 1,';
	} else {
		$slick_settings .= '"slidesToScroll": '.esc_attr($items_per_line).',';
	}
	if ($autoplay_carousel == 'yes') {
		$slick_settings .= '"autoplay": true,';
	} else {
		$slick_settings .= '"autoplay": false,';
	}
	$slick_settings .= isset($auto_play_time) ? '"autoplaySpeed": '.esc_attr($auto_play_time).',' : '"autoplaySpeed": 3000,';
	if ($infinite_scroll == 'yes') {
		$slick_settings .= '"infinite": true,';
	} else {
		$slick_settings .= '"infinite": false,';
	}
	if ($use_prev_next_carousel == 'yes') {
		$slick_settings .= '"arrows": false,';
	} else {
		$slick_settings .= '"arrows": true,';
	}
	if ($use_pagination_carousel == 'yes') {
		$slick_settings .= '"dots": false,';
	} else {
		$slick_settings .= '"dots": true,';
	}
	if ($adaptive_height == 'yes') {
		$slick_settings .= '"adaptiveHeight": true,';
	} else {
		$slick_settings .= '"adaptiveHeight": false,';
	}
	if (is_rtl()) {
		$slick_settings .= '"rtl": true,';
	} else {
		$slick_settings .= '"rtl": false,';
	}
	$slick_settings .= '"responsive": [{"breakpoint": 1024,"settings": {"slidesToShow": '.esc_attr($responsive_1024).',"slidesToScroll": '.esc_attr($responsive_sltscrl_1024).'}},{"breakpoint": 760, "settings": {"slidesToShow": '.esc_attr($responsive_760).', "slidesToScroll": '.esc_attr($responsive_sltscrl_760).'}} ]';

	$show_pagination = false;
	$show_more = false;
	$show_filters = false;

	if ($per_page <= $items_per_line) {
		$items_per_line = $per_page;
	}
}

if ( $show_filters ) {
	get_job_manager_template( 'job-filters.php', array( 'per_page' => $per_page, 'orderby' => $orderby, 'order' => $order, 'show_categories' => $show_categories, 'categories' => $categories, 'selected_category' => $selected_category, 'job_types' => $job_types, 'atts' => $atts, 'location' => $location, 'keywords' => $keywords, 'selected_job_types' => $selected_job_types, 'show_category_multiselect' => $show_category_multiselect ) );

	get_job_manager_template( 'job-listings-start.php' );
	get_job_manager_template( 'job-listings-end.php' );

	if ( ! $show_pagination && $show_more ) {
		echo '<div class="gt3_module_button  button_alignment_center"><a class="load_more_jobs button_size_normal btn_icon_position_right" href="#" style="display:none;"><span class="gt3_btn_text">' . __( 'Load More', 'listingeasy' ) . '</span><div class="btn_icon_container"><span class="gt3_btn_icon fa fa-angle-right"></span></div></a></div>';
	}

} else {
	$region_array = array();
	if( class_exists( 'Astoundify_Job_Manager_Regions' ) && ("1" === get_option('job_manager_regions_filter') ) ) { 
		if (!empty($location)) {
			$region_array = explode(',', $location);
		}
		$location = '';
	}elseif(is_numeric(str_replace(',', '', $location))){
		$location = '';
	}
	$jobs = get_job_listings( apply_filters( 'job_manager_output_jobs_args', array(
		'search_location'   => $location,
		'search_keywords'   => $keywords,
		'post_status'       => $post_status,
		'search_categories' => $categories,
		'job_types'         => $job_types,
		'orderby'           => $orderby,
		'order'             => $order,
		'posts_per_page'    => $per_page,
		'featured'          => $featured,
		'filled'            => $filled,
		'search_region'		=> $region_array // add if region plugin is active
		
	) ) );

	if ( ! empty( $job_types ) ) {
		$data_attributes[ 'job_types' ] = implode( ',', $job_types );
	}

	if ( $jobs->have_posts() ) : ?>

		<?php get_job_manager_template( 'job-listings-start.php' ); ?>

		<?php
			if ($use_carousel == 'yes') {
				echo '<div class="gt3_carousel_list" data-slick="{'.esc_attr($slick_settings).'}">';
			}
		?>

		<?php while ( $jobs->have_posts() ) : $jobs->the_post(); ?>
			<?php get_job_manager_template_part( 'content', 'job_listing' ); ?>
		<?php endwhile; ?>

		<?php
			if ($use_carousel == 'yes') {
				echo '</div>';
			}
		?>

		<?php get_job_manager_template( 'job-listings-end.php' ); ?>

		<?php if ( $jobs->found_posts > $per_page && ($show_more || $show_pagination) ) : ?>

			<?php wp_enqueue_script( 'wp-job-manager-ajax-filters' ); ?>

			<?php if ( $show_pagination ) : ?>
				<?php echo get_job_listing_pagination( $jobs->max_num_pages ); ?>
			<?php elseif($show_more) : ?> 
				<div class="gt3_module_button  button_alignment_center"><a class="load_more_jobs button_size_normal btn_icon_position_right" href="#"><span class="gt3_btn_text"><?php _e( 'Load More', 'listingeasy' ); ?></span><div class="btn_icon_container"><span class="gt3_btn_icon fa fa-angle-right"></span></div></a></div>
			<?php endif; ?>

		<?php endif; ?>

	<?php else :
		do_action( 'job_manager_output_jobs_no_results' );
	endif;

	wp_reset_postdata();
}

$data_attributes_string = '';
if ( ! is_null( $featured ) ) {
	$data_attributes[ 'featured' ]    = $featured ? 'true' : 'false';
}
if ( ! is_null( $filled ) ) {
	$data_attributes[ 'filled' ]      = $filled ? 'true' : 'false';
}
if ( ! empty( $post_status ) ) {
	$data_attributes[ 'post_status' ] = implode( ',', $post_status );
}
foreach ( $data_attributes as $key => $value ) {
	$data_attributes_string .= 'data-' . esc_attr( $key ) . '="' . esc_attr( $value ) . '" ';
}

$job_listings_output =  ob_get_clean();

$listing_class = 'gt3_listing_grid';
$listing_class .= ' gt3_listing_grid--'.(int)$items_per_line.'_column';
echo '<div class="job_listings '.$listing_class.' '. esc_attr($carousel_parent) .'" ' . $data_attributes_string . '>' . $job_listings_output . '</div>';

$custom_css = '';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($custom_css, ' '), $this->settings['base'], $atts);
$compile = '';

?>
