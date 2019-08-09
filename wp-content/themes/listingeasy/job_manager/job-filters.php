<?php
/**
 * The template for displaying the WP Job Manager Filters
 *
 * @package Listingeasy
 */
?>
<?php
	wp_enqueue_script( 'wp-job-manager-ajax-filters' );
	do_action( 'job_manager_job_filters_before', $atts );

	$types_visible_class = '';
	if (gt3_option('display_job_filter_types') == "1") {
		$types_visible_class = 'types_visible';
	}
?>

	<form class="job_filters <?php echo esc_attr($types_visible_class); ?>">
		<?php do_action( 'job_manager_job_filters_start', $atts ); ?>
		<a href="#" class="map_find_me"></a>
		<div class="search_jobs">
			<?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>
			<input type="hidden" name="search_keywords" id="search_keywords" value="<?php echo esc_attr( $keywords ); ?>"/>

			<div class="search_location">
				<label for="search_location"><?php esc_html_e( 'Location', 'listingeasy' ); ?></label>
				<?php if ( class_exists( 'Astoundify_Job_Manager_Regions' ) && "1" === get_option('job_manager_regions_filter') ) { ?>
					<div class="search_region-dummy">
						<input type="text" name="search_location" id="search_location" placeholder="<?php esc_html_e( 'Location', 'listingeasy' ); ?>" class="hidden" />
						<input type="text" class="select-region-dummy  search-field" disabled="disabled" placeholder="<?php esc_html_e( 'All Regions', 'listingeasy' ); ?>" />
					</div>
				<?php } else {
					if ( class_exists( 'WP_Job_Manager_Extended_Location' ) ) {
						$gt3_auto_loacate_class = 'class="gt3_auto_locate_view"';
					} else {
						$gt3_auto_loacate_class = '';
					}
					?>
					<input type="text" name="search_location" id="search_location" <?php echo $gt3_auto_loacate_class; ?> placeholder="<?php esc_html_e( 'Location', 'listingeasy' ); ?>" value="<?php echo esc_attr( $location ); ?>" />
				<?php } ?>
			</div>

			<div class="select-categories">
				<?php
				$has_listing_categories = get_terms( 'job_listing_category' );
				if ( $show_categories && ! is_wp_error( $has_listing_categories ) && ! empty( $has_listing_categories ) ) :

					//select the current category
					if ( empty( $selected_category ) ) {
						//try to see if there is a search_categories (notice the plural form) GET param
						$search_categories = isset( $_REQUEST['search_categories'] ) ? $_REQUEST['search_categories'] : '';
						if ( ! empty( $search_categories ) && is_array( $search_categories ) ) {
							$search_categories = $search_categories[0];
						}
						$search_categories = sanitize_text_field( stripslashes( $search_categories ) );
						if ( ! empty( $search_categories ) ) {
							if ( is_numeric( $search_categories ) ) {
								$selected_category = intval( $search_categories );
							} else {
								$term              = get_term_by( 'slug', $search_categories, 'job_listing_category' );
								$selected_category = $term->term_id;
							}
						} elseif ( ! empty( $categories ) && isset( $categories[0] ) ) {
							if ( is_string( $categories[0] ) ) {
								$term              = get_term_by( 'slug', $categories[0], 'job_listing_category' );
								$selected_category = $term->term_id;
							} else {
								$selected_category = intval( $categories[0] );
							}
						}
					} ?>

					<div class="search_categories">
						<label for="search_categories"><?php esc_html_e( 'Category', 'listingeasy' ); ?></label>
						<?php job_manager_dropdown_categories( array(
							'taxonomy'        => 'job_listing_category',
							'hierarchical'    => 1,
							'show_option_all' => esc_html__( 'Any Category', 'listingeasy' ),
							'name'            => 'search_categories',
							'orderby'         => 'name',
							'selected'        => $selected_category,
							'multiple'        => false,
							'hide_empty' => false
						) ); ?>
					</div>

				<?php endif; ?>
			</div><!-- .select-categories -->
			<?php
			$job_tags = get_terms( array( 'job_listing_tag' ), array( 'hierarchical' => 1 ) );
			if ( ! is_wp_error( $job_tags ) && ! empty ( $job_tags ) ) { ?>
				<div class="select-tags">
					<select class="tags-select" data-placeholder="<?php esc_html_e( 'Filter by tags', 'listingeasy' ); ?>"
					        name="job_tag_select" multiple>
						<?php foreach ( $job_tags as $term ) : ?>
							<option value="<?php echo  $term->name ?>"><?php echo  $term->name; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			<?php }
			do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>
		</div><!-- .search_jobs -->
		<div class="active-tags"></div>

		<div class="gt3_mobile_buttons">
			<button class="btn_filter"><?php esc_html_e( 'Filter listings', 'listingeasy' ); ?></button>
			<button class="btn_view"><?php esc_html_e( 'Show/Hide Map', 'listingeasy' ); ?></button>
		</div>

		<?php do_action( 'job_manager_job_filters_end', $atts ); ?>

	</form><!-- .job_filter -->

	<?php do_action( 'job_manager_job_filters_after', $atts ); ?>