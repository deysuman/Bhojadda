<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ListingEasy
 */

get_header(); ?>
<section id='main_content'>
	<?php
	global $wp_query, $current_jobs_shortcode;
	$term =	$wp_query->queried_object;
	if ( isset( $term->slug) ) {
		$shortcode = '[jobs job_types="' . $term->slug . '" show_tags="true"';

		//get the listings page (Selected in the WPJM settings) job shortcode show_map parameter
		//we will apply it here also
		$show_map = gt3_listings_page_shortcode_get_show_map_param();
		if ( false === $show_map ) {
			$shortcode .= ' show_map="false"';
		} else {
			$shortcode .= ' show_map="true"';
		}

		//get the listings page (Selected in the WPJM settings) job shortcode orderby parameter
		//we will apply it here also
		$orderby = gt3_listings_page_shortcode_get_orderby_param();
		$shortcode .= ' orderby="' . $orderby . '"';

		//get the listings page (Selected in the WPJM settings) job shortcode order parameter
		//we will apply it here also
		$order = gt3_listings_page_shortcode_get_order_param();
		$shortcode .= ' order="' . $order . '"';

		$shortcode .= ']';
		//save the shortcode so we can use it later to look at it's parameters in filters
		//this is because WPJM doesn't pass the parameters in some filters
		$current_jobs_shortcode = $shortcode;
		echo do_shortcode(  $shortcode );
		$current_jobs_shortcode = null;
	} ?>
</section>
<?php get_footer(); ?>
